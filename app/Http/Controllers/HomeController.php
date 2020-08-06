<?php

namespace App\Http\Controllers;

use App\Cook;
use App\Comment;
use App\Food;
use App\Transaction;
use App\Peyk;
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
            $orders = Transaction::wherePonied(1)->where('peyk_share', '!=', 0)->whereNull('peyk_id')->get();
            $fresh_cooks = Cook::whereFresh(1)->get();
            $pending_comments = Comment::whereConfirmed(0)->get();
            $pending_foods = Food::whereConfirmed(0)->get();
            $peyks = Peyk::all();
            return view('home', compact('fresh_cooks', 'pending_comments', 'pending_foods', 'orders', 'peyks'));
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
