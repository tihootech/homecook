<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Food;
use App\Customer;
use App\Transaction;
use App\TransactionItem;
use App\Token;
use App\User;
use App\Address;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['finish', 'finalize']);
        $this->middleware('only_customer')->only(['finish', 'finalize']);
    }

    public function add(Request $request)
    {

        $food = Food::whereUid($request->food)->firstOrFail();

        // validate request
		$request->validate([
			'count'=>'required|integer|min:'.$food->min,
		]);

        // extract session and initial variables
        $cart = current_cart(true);
        $tuid = session('tuid');
        $settings = settings();
        $transaction = Transaction::whereUid($tuid)->firstOrFail();

        // finantial data
        $count = $request->count;
        $cost = $food->getCost();
        $payable = $count * $cost;

        // new items in db
        TransactionItem::create([
            'transaction_id' => $transaction->id,
            'food_id' => $food->id,
            'cook_id' => $food->cook_id,

            'cost' => $cost,
            'count' => $count,
            'payable' => $payable,

            'master_share' => percent($payable, $settings->added_price),
            'tax' => percent($payable, $settings->tax),
            'cook_share' => percent($payable, $settings->cook_percent),
        ]);

        // take care of the session
		$cart[$food->uid] = $request->count;
		session(compact('cart'));

        // update total and peyk share for transaction
        $transaction->update_changes_to_cart();

		return view('includes.added_to_cart');
    }

	public function checkout()
	{
		$type = 'checkout';
        $transaction = Transaction::whereUid(session('tuid'))->first();
		return view('landing.checkout', compact('type', 'transaction'));
	}

	public function register(Request $request)
	{
		$data = $request->validate([
			'first_name' => 'required|string|max:190',
			'last_name' => 'required|string|max:190',
			'username' => 'required|string|min:3|max:100|unique:users',
			'password' => 'required|string|min:4|confirmed',
			'mobile' => 'required|string|digits:11|unique:customers',
		]);
        $data['password'] = bcrypt('password');
		$customer = Customer::make($data);
		return redirect()->route('cart.code', [$customer->uid, $request->in_cart]);
	}

    public function login(Request $request)
	{
		$user = User::whereUsername($request->username)->first();
        if ($user && $user->password == \Hash::check($request->password, $user->password)) {
            if ($user->type != 'customer') {
                return back()->withErrors(['با این حساب کاربری نمیتوان خرید انجام داد. لطفا یک حساب کاربری مختص خرید ایجاد کنید.']);
            }else {
                \Auth::login($user);
                return redirect()->route('cart.address', $user->owner->uid);
            }
        }else {
            return back()->withErrors(['نام کاربری یا رمزعبور اشتباه است.']);
        }
	}

	public function code($uid, $in_cart)
	{
		$type = 'code';
		$customer = Customer::whereUid($uid)->firstOrFail();
		return view('landing.checkout', compact('type', 'customer', 'in_cart'));
	}

    public function send_again($mobile)
    {
        return back()->withErrors(['در دست ساخت']);
    }

	public function address($uid)
	{
		$type = 'address';
		$customer = Customer::whereUid($uid)->firstOrFail();
		if ($customer->user && $customer->user->acc_verified_at) {
			return view('landing.checkout', compact('type', 'customer'));
		}else {
			abort(404);
		}
	}

	public function review($tuid)
	{
		$type = 'review';
		$transaction = Transaction::whereUid($tuid)->firstOrFail();
        return view('landing.checkout', compact('type', 'transaction'));
	}

	public function activate($uid, Request $request)
	{
		$customer = Customer::whereUid($uid)->firstOrFail();
		$token = Token::whereMobile($customer->mobile)->whereCode($request->code)->first();
		if ($token) {
			$user = $customer->user;
			$user->acc_verified_at = Carbon::now();
			$user->save();
            if ($request->in_cart) {
                return redirect()->route('cart.address', $customer->uid);
            }else {
                return redirect()->route('home');
            }
		}else {
			return back()->withErrors(['کد وارد شده صحیح نیست'])->withInput();
		}
	}

    public function finalize(Request $request)
    {
        // take care of address
        $customer = current_customer();
        if ($request->new_address) {
            $address = $customer->add_address($request->new_address);
        }elseif ($request->address) {
            $address = Address::findOrFail($request->address);
            $address->set_as_primary();
        }else {
            return back()->withErrors([__('ERROR')]);
        }

        // work with transaction
        $transaction = Transaction::whereUid(session('tuid'))->first();
        if (!$transaction) {
            return back()->withError(__('ERROR'));
        }
        $transaction->update([
            'customer_id' => $customer->id,
            'address_id' => $address->id,
        ]);
        return redirect()->route('cart.review', $transaction->uid);
    }

	public function destroy($uid)
	{
        // clear from session
        $cart = current_cart();
		unset($cart[$uid]);
		session(compact('cart'));

        // clear from database
        $food = Food::where('uid', $uid)->first();
        if ($food) {
            $tuid = session('tuid');
            $transaction = Transaction::whereUid($tuid)->first();
            if ($transaction) {
                $item = TransactionItem::where('transaction_id', $transaction->id)->where('food_id', $food->id)->first();
                $decrement = $item->payed ?? 0;
                $item->delete();
                $transaction->update_changes_to_cart();
            }
        }

        // prepare output
        $output['total'] = $transaction->total ?? 0;
        $output['peyk_share'] = $transaction->peyk_share ?? 0;
        $output['cook_count'] = isset($transaction) ? $transaction->count_cooks() : 0;

        return $output;
	}

    public function finish($tuid)
    {
        // find transaction
        $transaction = Transaction::whereUid($tuid)->firstOrFail();

        // pony transaction
        $transaction->ponied = 1;
        $transaction->save();
        TransactionItem::where('transaction_id', $transaction->id)->update([
            'ponied' => 1
        ]);

        // clear session data
        session([
            'tuid' => null,
            'cart' => null,
        ]);

        // show message
        return redirect()->route('landing.message')->withMessage('تراکنش شما با موفقیت انجام شد.');
    }

}
