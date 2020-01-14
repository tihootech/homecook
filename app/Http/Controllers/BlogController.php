<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('master');
    }

    public function index()
    {
        $blogs = Blog::latest()->paginate(20);
        return view('dashboard.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $blog = new Blog;
        return view('dashboard.blogs.form', compact('blog'));
    }

    public function store(Request $request)
    {
        $data = self::validation(new Blog);
        Blog::create($data);
        return redirect()->route('blog.index')->withMessage(__('SUCCESS'));
    }

    public function edit(Blog $blog)
    {
        return view('dashboard.blogs.form', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = self::validation($blog);
        $blog->update($data);
        return redirect()->route('blog.index')->withMessage(__('SUCCESS'));
    }

    public function destroy(Blog $blog)
    {
        delete_file([$blog->image, $blog->bg]);
        $blog->delete();
        return redirect()->route('blog.index')->withMessage(__('SUCCESS'));
    }

    public static function validation($blog)
    {
        // init validation
        $data = request()->validate([
            'title' => 'required|unique:blogs,title,'.$blog->id,
            'subtitle' => 'nullable',
            'tags' => 'nullable',
            'content' => 'required',
            'image' => Rule::requiredIf(!$blog->id),
            'bg' => Rule::requiredIf(!$blog->id),
        ]);

        // replace - with _
        if (strpos($data['title'], '-') !== false) {
            $data['title'] = str_replace('-', '_', $data['title']);
        }

        // upload images
        if ( isset($data['image']) && $data['image'] ) {
            $data['image'] = upload($data['image'], $blog->image);
        }
        if ( isset($data['bg']) && $data['bg'] ) {
            $data['bg'] = upload($data['bg'], $blog->bg);
        }
        if ( isset($data['tags']) && $data['tags'] ) {
            $data['tags'] = str_replace("\r\n", ",", $data['tags']);
        }

        return $data;
    }
}
