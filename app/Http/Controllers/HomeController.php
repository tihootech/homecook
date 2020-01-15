<?php

namespace App\Http\Controllers;

use App\Cook;
use App\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (master()) {
            $fresh_cooks = Cook::whereFresh(1)->get();
            $pending_comments = Comment::whereConfirmed(0)->get();
            return view('home', compact('fresh_cooks', 'pending_comments'));
        }elseif (cook()) {
            $cook = current_cook();
            return view('home', compact('cook'));
        }else {
            return view('home');
        }
    }
}
