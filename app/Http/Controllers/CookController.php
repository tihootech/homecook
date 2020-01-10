<?php

namespace App\Http\Controllers;

use App\Cook;
use App\User;
use Illuminate\Http\Request;

class CookController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:190',
            'last_name' => 'required|string|max:190',
            'telephone' => 'nullable|digits:11|unique:cooks',
            'mobile' => 'required|digits:11|unique:cooks',
            'state' => 'required|string|max:190',
            'city' => 'required|string|max:190',
            'hood' => 'required|string|max:190',
            'address' => 'required',
        ]);
        $data['uid'] = rs(8);
        Cook::create($data);
        return redirect()->route('landing.message')->withMessage('درخواست شما برای عضویت در سامانه ما با موفقیت ثبت شد.');
    }

    public function show(Cook $cook)
    {
        //
    }

    public function edit(Cook $cook)
    {
        //
    }

    public function update(Request $request, Cook $cook)
    {
        //
    }

    public function destroy(Cook $cook)
    {
        //
    }
}
