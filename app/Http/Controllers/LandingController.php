<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
    	return view('landing.index');
    }

    public function new_cook()
    {
        return view('landing.new_cook');
    }

    public function message()
    {
        $message = session('message');
        return view('landing.message', compact('message'));
    }
}
