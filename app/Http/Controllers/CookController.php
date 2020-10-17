<?php

namespace App\Http\Controllers;

use App\Cook;
use App\City;
use App\State;
use App\User;
use Illuminate\Http\Request;

class CookController extends Controller
{

    public function __construct()
	{
		$this->middleware('auth')->except(['store']);
		$this->middleware('admins')->except(['store', 'cook_edit', 'cook_update']);
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
        if ($request->nickname) {
            $cooks = $cooks->where('nickname', 'like', "%$request->nickname%");
        }
        if ($request->telephone) {
            $cooks = $cooks->where('telephone', 'like', "%$request->telephone%");
        }
        if ($request->active) {
            $cooks = $cooks->whereActive(1);
        }
        if (only_admin()) {
            $cooks = $cooks->where('city_id', user('city_id'));
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
        $states = State::all();
        $cities = City::where('state_id', 22)->get();
        return view('dashboard.cooks.form', compact('cook', 'cities', 'states'));
    }

    public function store(Request $request)
    {
        $data = self::validation();
        $data['uid'] = rs(8);
        $cook = Cook::create($data);
        if (only_admin() && $data['city_id'] != user('city_id')) {
            return back()->withError('شما به این شهر دسترسی ندارید.')->withInput();
        }
        if ($request->in_panel && admins()) {
            self::accept_process($cook);
            return redirect()->route('cook.index')->withMessage('همکار جدید در سیستم تعریف شد، و به حساب کاربری وی نیز فعال شد.');
        }else {
            return redirect()->route('landing.message')->withMessage('درخواست شما برای عضویت در سامانه ما با موفقیت ثبت شد.');
        }
    }

    public function edit(Cook $cook)
    {
        aacheck($cook);
        $states = State::all();
        $cities = City::where('state_id', 22)->get();
        return view('dashboard.cooks.form', compact('cook', 'cities', 'states'));
    }

    public function cook_edit($uid)
    {
        $cook = Cook::where('uid', $uid)->firstOrFail();
        check($cook, 'cook');
        $states = State::all();
        $cities = City::where('state_id', 22)->get();
        return view('dashboard.cooks.form', compact('cook', 'cities', 'states'));
    }

    public function update(Cook $cook, Request $request)
    {
        aacheck($cook);
        $data = self::validation($cook->id);
        $cook->update($data);
        return redirect()->route('cook.index')->withMessage(__('SUCCESS'));
    }

    public function cook_update($uid, Request $request)
    {
        $cook = Cook::where('uid', $uid)->firstOrFail();
        check($cook, 'cook');
        $data = self::validation($cook->id);
        if (!$request->nf) {
            $data['fresh'] = 1;
        }
        $cook->update($data);
        return redirect()->route('home')->withMessage(__('SUCCESS'));
    }

    public function accept(Cook $cook)
    {
        aacheck($cook);
        self::accept_process($cook);
        return back()->withMessage('همکار مورد نظر با موفقیت تایید شد و برای او یک حساب کاربری تایین شد و از طریق پیام کوتاه به او اطلاع رسانی شد.');
    }

    public function modify(Cook $cook, Request $request)
    {
        aacheck($cook);

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
        aacheck($cook);
        $cook->nickname = $cook->nickname . "_bu";
        $cook->mobile = $cook->mobile . "_bu";
        $cook->save();
        $cook->delete();
        if ($cook->user) {
            $cook->user->delete();
        }
        return back()->withMessage('تغییرات با موفقیت انجام شد.');
    }

    public function fresh_requests()
    {
        $fresh_requests = Cook::whereFresh(1);
        if (only_admin()) {
            $fresh_requests = $fresh_requests->where('city_id', user('city_id'));
        }
        $fresh_requests = $fresh_requests->get();
        return view('dashboard.cooks.fresh_requests', compact('fresh_requests'));
    }

    public static function accept_process($cook)
    {
        aacheck($cook);

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
        $state_city_required_or_not = master() ? 'required' : 'nullable';
        $data = request()->validate([
            'first_name' => 'required|string|max:190',
            'last_name' => 'required|string|max:190',
            'nickname' => 'nullable|string|max:190|unique:cooks,nickname,'.$id,
            'telephone' => 'nullable|digits:11',
            'mobile' => 'required|digits:11|unique:cooks,mobile,'.$id,
            'state_id' => $state_city_required_or_not.'|exists:states,id',
            'city_id' => $state_city_required_or_not.'|exists:cities,id',
            'hood' => 'required|string|max:190',
            'address' => 'required',
        ]);
        if (only_admin()) {
            $city = City::findOrFail(user('city_id'));
            $data['city_id'] = $city->id;
            $data['state_id'] = $city->state_id;
        }
        if (admins()) {
            $data['active'] = request('active') ?? false;
        }
        return $data;
    }
}
