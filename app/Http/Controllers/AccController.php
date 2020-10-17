<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;
use App\UserActivity;

class AccController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admins')->except(['edit', 'update']);
	}

	// public function list(Request $request)
	// {
	// 	$users = User::where('type', '!=', 'master');
	// 	if ($type = $request->type) {
	// 		$users = $users->where('type', $type);
	// 	}
	// 	if ($phrase = $request->search) {
	// 		$users = $users->where('name', 'like', "%$phrase%")->orWhere('email', 'like', "%$phrase%");
	// 	}
	// 	$users = $users->paginate(20);
	// 	return view('dashboard.acc.list', compact('users'));
	// }

	public function show(User $user)
	{
		return view('dashboard.acc.show', compact('user'));
	}

    public function edit()
    {
    	$user = auth()->user();
		return view('dashboard.acc.edit', compact('user'));
    }

	public function update(Request $request)
	{
		$user = auth()->user();

		$request->validate([
			"username" => "required",
			"current_password" => "required",
			"new_password" => "nullable|confirmed|string|min:4",
		]);

		$change = false;
		if (\Hash::check($request->current_password, $user->password)) {
			if ($user->username != $request->username) {
				$user->username = $request->username;
				$change =true;
			}
			if ($request->new_password) {
				$user->password = bcrypt($request->new_password);
				$change =true;
			}
			if ($change) {
				$user->save();
				return redirect('login')->with(\Auth::logout())->withMessage('اطلاعات حساب کاربری شما تغییر یافت.');
			}else {
				return back()->withError('شما تغییری در اطلاعات قبلی نداده اید.');
			}
		}else {
			return back()->withError('رمزعبور فعلی اشتباه است.');
		}
	}

	// public function master_update(User $user, Request $request)
	// {
	// 	$user->type = $request->type;
	// 	if ($request->new_password) {
	// 		$user->password = bcrypt($request->new_password);
	// 	}
	// 	$user->save();
	// 	return back()->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
	// }

	// public function destroy(User $user)
	// {
	// 	if ($user->type == 'master') {
	// 		return back()->withError(__('CANT_DELETE_MASTER'));
	// 	}else {
	// 		$user->delete();
	// 		return back()->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
	// 	}
	// }

}
