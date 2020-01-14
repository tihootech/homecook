<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('store');
        $this->middleware('master')->except('store');
    }

    public function index()
    {
        $comments = Comment::orderBy('confirmed')->latest()->get();
        return view('dashboard.comment.index', compact('comments'));
    }

    public function create()
    {
        $comment = new Comment;
        return view('dashboard.comment.form', compact('comment'));
    }

    public function store(Request $request)
    {
        $data = self::validation();
        if($request->ajax()){
            if (master()) {
                $data['confirmed'] = 1;
            }
            Comment::create($data);
            return view('ajaxes.comment_ok');
        }elseif(master()) {
            $data['confirmed'] = $request->confirmed;
            $data['author_id'] = null; // for fake comments
            Comment::create($data);
            return redirect()->route('comment.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
        }else {
            abort(404);
        }
    }

    public function edit(Comment $comment)
    {
        return view('dashboard.comment.form', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $data = $request->validate([
            'content' => 'required',
            'confirmed' => 'required|boolean',
        ]);
        $comment->update($data);
        return redirect()->route('comment.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function confirm(Comment $comment)
    {
        $comment->confirmed = !$comment->confirmed;
        $comment->save();
        return back()->withMessage(__('COMMENT_CONFIRMED'));
    }

    public function confirm_all()
    {
        Comment::whereConfirmed(0)->update([
            'confirmed' => 1
        ]);
        return back()->withMessage(__('ALL_COMMENTS_CONFIRMED'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comment.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function validation()
    {
        $data = request()->validate([
            'content'=>'required',
            'owner_id'=>'required',
            'owner_type'=> Rule::in(['comment', 'blog', 'course']),
        ]);
        $data['author_id'] = auth()->id();
        $data['owner_type'] = class_name($data['owner_type']);

        $found = $data['owner_type']::find($data['owner_id']);
        if (!$found) {
            abort(403);
        }

        return $data;
    }
}
