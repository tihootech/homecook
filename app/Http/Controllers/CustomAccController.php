<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Token;


class CustomAccController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
	}

    public function register_form()
    {

    }

	public function forget_password(Request $request)
	{
		$user = User::whereUsername($request->keyword)->first();
		$users = [];
		if ($user) {
			if ($user->type == 'master') {
				return back()->withErrors(['برای بازیابی رمز عبور اکانت مستر با پشتیبانی هماهنگ کنید.']);
			}else {
				$users [$user->id]= $user;
			}
		}else {

			$acc_types = ['cook', 'customer', 'peyk'];
			foreach ($acc_types as $acc_type) {
				$class = class_name($acc_type);
				$found = $class::whereMobile($request->keyword)->first();
				if ($found) {
					$users [$found->user_id]= $found->user;
				}
			}

		}

		if (count($users)) {
			return view('auth.choose_account', compact('users'));
		}else {
			return back()->withErrors(['حساب کاربری با این مشخصات پیدا نشد.']);
		}
	}

	public function send_code(User $user)
	{
		$mobile = $user->owner->mobile;
		Token::whereMobile($mobile)->delete();
		$token = Token::make($mobile);
		TextMessageController::store('code', $mobile, [$token->code]);
		return redirect()->route('acc.enter_code', $user->id);
	}

	public function enter_code(User $user)
	{
		return view('auth.enter_code', compact('user'));
	}

	public function reset_password(User $user, Request $request)
	{
		$request->validate([
			'password' => 'required|string|min:6|confirmed',
			'code' => 'required|exists:tokens,code',
		]);
		$token = Token::whereCode($request->code)->whereMobile($user->owner->mobile)->first();
		if (!$token) {
			return back()->withErrors(['کد تایید وارد شده مخصوص شما نیست.']);
		}else {
			$token->delete();
			$user->password = bcrypt($request->password);
			$user->save();
			\Auth::login($user);
			return redirect('home')->withMessage('حساب کاربری شما با موفقیت بازیابی شد و رمزعبور شما تغییر یافت.');
		}
	}

}
