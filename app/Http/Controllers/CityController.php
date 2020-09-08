<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('master');
    }

    public function manage()
    {
        $cities = City::whereSelected(false)->get();
        $selected_cities = City::whereSelected(true)->get();
        return view('dashboard.cities.manage', compact('cities', 'selected_cities'));
    }

    public function update(Request $request)
    {
        City::whereIn('id', $request->city)->update([
            'selected' => true
        ]);
        return back()->withMessage(__('SUCCESS'));
    }

    public function unselect(City $city)
    {
        $city->update([
            'selected' => false
        ]);
        return back()->withMessage(__('SUCCESS'));
    }
}
