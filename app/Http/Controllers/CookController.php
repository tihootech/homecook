<?php

namespace App\Http\Controllers;

use App\Cook;
use App\User;
use Illuminate\Http\Request;

class CookController extends Controller
{

    public function __construct()
	{
		$this->middleware('auth')->except(['store']);
		$this->middleware('master')->except(['store', 'cook_edit', 'cook_update']);
	}

    public function index(Request $request)
    {
        $cooks = Cook::query();
        if ($request->name) {
            $cooks = $cooks->where(function ($cooks) use ($request) {
                $cooks->where('first_name', 'like', "%$request->name%")->orWhere('last_name', 'like', "%$request->name%");
            });
        }
        if ($request->mobile) {
            $cooks = $cooks->where('mobile', 'like', "%$request->mobile%");
        }
        if ($request->telephone) {
            $cooks = $cooks->where('telephone', 'like', "%$request->telephone%");
        }
        if ($request->active) {
            $cooks = $cooks->whereActive(1);
        }
        $cooks = $cooks->latest()->paginate(20);
        return view('dashboard.cooks.index', compact('cooks'));
    }

    public function show(Cook $cook)
    {
        return view('dashboard.cooks.show', compact('cook'));
    }

    public function create()
    {
        $cook = new Cook;
        return view('dashboard.cooks.form', compact('cook'));
    }

    public function store(Request $request)
    {
        $data = self::validation();
        $data['uid'] = rs(8);
        $cook = Cook::create($data);
        if ($request->in_panel && master()) {
            self::accept_process($cook);
            return back()->withMessage('همکار جدید در سیستم تعریف شد، و به حساب کاربری وی نیز فعال شد.');
        }else {
            return redirect()->route('landing.message')->withMessage('درخواست شما برای عضویت در سامانه ما با موفقیت ثبت شد.');
        }
    }

    public function edit(Cook $cook)
    {
        return view('dashboard.cooks.form', compact('cook'));
    }

    public function cook_edit($uid)
    {
        $cook = Cook::where('uid', $uid)->firstOrFail();
        check($cook, 'cook');
        return view('dashboard.cooks.form', compact('cook'));
    }

    public function update(Cook $cook, Request $request)
    {
        $data = self::validation($cook->id);
        $cook->update($data);
        return redirect()->route('cook.index')->withMessage(__('SUCCESS'));
    }

    public function cook_update($uid, Request $request)
    {
        $cook = Cook::where('uid', $uid)->firstOrFail();
        check($cook, 'cook');
        $data = self::validation($cook->id);
        $data['fresh'] = 1;
        $cook->update($data);
        return redirect()->route('home')->withMessage(__('SUCCESS'));
    }

    public function accept(Cook $cook)
    {
        self::accept_process($cook);
        return back()->withMessage('همکار مورد نظر با موفقیت تایید شد و برای او یک حساب کاربری تایین شد و از طریق پیام کوتاه به او اطلاع رسانی شد.');
    }

    public function modify(Cook $cook, Request $request)
    {
        // update cook instance
        $cook->modify($request->reason);

        if (!$cook->user) {
            // create user account for the cook and catch auto generated password
            $password = $cook->create_user_acount();

            // send a text message and notifythe cook
            TextMessageController::store('cookmodify', $cook->mobile, [
                $cook->mobile, $password
            ]);
        }

        // redirection
        return back()->withMessage('درخواست اصلاح برای کاربر مورد نظر با موفقیت ارسال شد.');
    }

    public function destroy(Cook $cook)
    {
        $cook->delete();
        if ($cook->user) {
            $cook->user->delete();
        }
        return back()->withMessage('تغییرات با موفقیت انجام شد.');
    }

    public function fresh_requests()
    {
        $fresh_requests = Cook::whereFresh(1)->get();
        return view('dashboard.cooks.fresh_requests', compact('fresh_requests'));
    }

    public static function accept_process($cook)
    {
        // update cook instance and accept it
        $cook->accept();

        if (!$cook->user) {
            // create user account for the cook and catch auto generated password
            $password = $cook->create_user_acount();

            // send a text message and notifythe cook
            TextMessageController::store('cookaccept', $cook->mobile, [
                $cook->mobile, $password
            ]);
        }else {
            TextMessageController::store('cookmodifyaccept', $cook->mobile, [
                $cook->mobile
            ]);
        }
    }

    public static function validation($id=0)
    {
        $data = request()->validate([
            'first_name' => 'required|string|max:190',
            'last_name' => 'required|string|max:190',
            'telephone' => 'nullable|digits:11',
            'mobile' => 'required|digits:11|unique:cooks,mobile,'.$id,
            'state' => 'required|string|max:190',
            'city' => 'required|string|max:190',
            'hood' => 'required|string|max:190',
            'address' => 'required',
        ]);
        if (master()) {
            $data['active'] = request('active') ?? false;
        }
        return $data;
    }
}
