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
        return view('dashboard.comments.index', compact('comments'));
    }

    public function store(Request $request)
    {
        $data = self::validation();
        Comment::create($data);
        return back()->withMessage('کامنت شما با موفقیت ایجاد شد. منتظر تایید ناظر باشید.');
    }

    public function edit(Comment $comment)
    {
        return view('dashboard.comments.form', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $data = $request->validate([
            'body' => 'required',
            'confirmed' => 'required|boolean',
        ]);
        $comment->update($data);
        return redirect()->route('comment.index')->withMessage(__('SUCCESS'));
    }

    public function confirm(Comment $comment)
    {
        $comment->confirmed = !$comment->confirmed;
        $comment->save();
        return back()->withMessage(__('کامنت مورد نظر تایید شد'));
    }

    public function confirm_all()
    {
        Comment::whereConfirmed(0)->update([
            'confirmed' => 1
        ]);
        return back()->withMessage(__('همه کامنت ها تایید شدند'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comment.index')->withMessage(__('SUCCESS'));
    }

    public function validation()
    {
        $data = request()->validate([
            'body'=>'required',
            'owner_id'=>'required',
            'owner_type'=> Rule::in(['blog']),
        ]);
        $data['author_id'] = auth()->id();
        $data['owner_type'] = class_name($data['owner_type']);

        $found = $data['owner_type']::find($data['owner_id']);
        if (!$found) {
            abort(404);
        }

        return $data;
    }
}
