<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class AjaxController extends Controller
{
    public function state_change(Request $request)
    {
    	if ($request->ajax()) {
			$cities = City::where('state_id', $request->state)->get();
			return view('ajaxes.cities', compact('cities'));
    	}else {
    		abort(404);
    	}
    }
}
