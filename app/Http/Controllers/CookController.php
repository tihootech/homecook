<?php

namespace App\Http\Controllers;

use App\Cook;
use App\User;
use Illuminate\Http\Request;

class CookController extends Controller
{

    public function __construct()
	{
		$this->middleware('master')->except(['store']);
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

    public function accept()
    {
        return back()->withMessage('این قسمت بعد از راه اندازی پنل پیامکی ایجاد میشود.');
    }

    public function modify()
    {
        return back()->withMessage('این قسمت بعد از راه اندازی پنل پیامکی ایجاد میشود.');
    }

    public function destroy(Cook $cook)
    {
        $cook->delete();
        return back()->withMessage('تغییرات با موفقیت انجام شد.');
    }

    public function fresh_requests()
    {
        $fresh_requests = Cook::whereFresh(1)->get();
        return view('dashboard.cooks.fresh_requests', compact('fresh_requests'));
    }

}
