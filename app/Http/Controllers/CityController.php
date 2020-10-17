<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\User;
use App\Admin;

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

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required|unique:admins',
            'full_name' => 'required|string',
            'username' => 'required|unique:users',
            'pwd' => 'required|string|min:4',
        ]);

        // mark city as selected
        City::where('id', $request->city_id)->update([
            'selected' => true
        ]);

        // create user in db
        $user = User::create([
            'username' => $request->username,
            'acc_verified_at' => now(),
            'password' => bcrypt($request->pwd),
            'type' => 'admin',
            'city_id' => $request->city_id,
        ]);

        // create an admin in admins table
        Admin::create([
            'user_id' => $user->id,
            'city_id' => $request->city_id,
            'full_name' => $request->full_name,
        ]);


        return back()->withMessage(__('SUCCESS'));
    }

    public function unselect(City $city)
    {
        $city->update([
            'selected' => false
        ]);
        Admin::where('city_id', $city->id)->delete();
        User::where('city_id', $city->id)->where('type', 'admin')->delete();
        return back()->withMessage(__('SUCCESS'));
    }
}
