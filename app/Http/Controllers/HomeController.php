<?php

namespace App\Http\Controllers;

use App\Cook;
use App\Comment;
use App\Food;
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
            $pending_foods = Food::whereConfirmed(0)->get();
            return view('home', compact('fresh_cooks', 'pending_comments', 'pending_foods'));
        }elseif (cook()) {
            $cook = current_cook();
            return view('home', compact('cook'));
        }elseif (customer()) {
            $transactions = current_customer('transactions');
            $customer = current_customer();
            return view('home', compact('transactions', 'customer'));
        }else {
            return view('home');
        }
    }
}
