<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionItem;
use App\Peyk;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('master')->except('index');
    }

    public function index()
    {

        if ( cook() ) {

            $items = TransactionItem::where('cook_id', current_cook('id'))->paginate(20);
            return view('dashboard.transactions.cook_list', compact('items'));

        }else {

            $transactions = Transaction::wherePonied(1);
            if (customer()) {
                $transactions = $transactions->where('customer_id', current_customer('id'));
            }
            if (peyk()) {
                $transactions = $transactions->where('peyk_id', current_peyk('id'));
            }
            $transactions = $transactions->paginate(20);
            return view('dashboard.transactions.index', compact('transactions'));

        }

    }

    public function show(Transaction $transaction)
    {
        return view('dashboard.transactions.show', compact('transaction'));
    }

    public function set_peyk(Transaction $transaction, Request $request)
    {
        $peyk = Peyk::findOrFail($request->peyk);
        $transaction->peyk_id = $peyk->id;
        $transaction->save();
        TextMessageController::store('setpeyk', $peyk->mobile, [route('view_transaction', ['peyk', $transaction->uid])]);
        return back()->withMessage(__('SUCCESS'));
    }
}
