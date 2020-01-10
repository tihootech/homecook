<?php

namespace App\Http\Controllers;

use App\Cook;
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
            return view('home', compact('fresh_cooks'));
        }else {
            // code...
            return view('home');
        }
    }
}
