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
        // validate request
		$request->validate([
			'count'=>'required|integer',
			'food'=>'required|exists:foods,uid',
		]);

        // extract session and initial variables
        $cart = current_cart(true);
        $tuid = session('tuid');
        $settings = settings();
        $food = Food::whereUid($request->food)->firstOrFail();
        $transaction = Transaction::whereUid($tuid)->firstOrFail();

        // finantial data
        $count = $request->count;
        $payable = $food->cost;
        $tax = percent($payable, $settings->tax);
        $added_price = percent($payable, $settings->added_price);
        $cook_cut = $payable - $added_price - $tax;

        // new items in db
        TransactionItem::create([
            'transaction_id' => $transaction->id,
            'food_id' => $food->id,
            'cook_id' => $food->cook_id,
            'payable' => $payable,
            'tax' => $tax,
            'added_price' => $added_price,
            'cook_cut' => $cook_cut,
            'count' => $count,
            'total_payable' => $payable * $count,
        ]);

        // take care of the session
		$cart[$food->uid] = $request->count;
		session(compact('cart'));

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
			'password' => 'required|string|min:4',
			'mobile' => 'required|string|digits:11|unique:customers',
		]);
        $data['password'] = bcrypt('password');
		$customer = Customer::make($data);
		return redirect()->route('cart.code', $customer->uid);
	}

    public function login(Request $request)
	{
		$user = User::whereUsername($request->username)->first();
        if ($user && $user->password == \Hash::check($request->password, $user->password)) {
            \Auth::login($user);
            return redirect()->route('cart.address', $user->owner->uid);
        }else {
            return back()->withErrors(['نام کاربری یا رمزعبور اشتباه است.']);
        }
	}

	public function code($uid)
	{
		$type = 'code';
		$customer = Customer::whereUid($uid)->firstOrFail();
		return view('landing.checkout', compact('type', 'customer'));
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
			return redirect()->route('cart.address', $customer->uid);
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
            'user_id' => auth()->id(),
            'customer_id' => $customer->id,
            'address_id' => $address->id,
            'total' => $transaction->calc_total(),
            'peyk_share' => settings('peyk_share'),
            'cook_share' => $transaction->calc_cook_share(),
            'cook_share' => $transaction->calc_master_share(),
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
                TransactionItem::where('transaction_id', $transaction->id)->where('food_id', $food->id)->delete();
            }
        }

        return isset($transaction) && $transaction ? $transaction->calc_total() : 0;
	}

}
