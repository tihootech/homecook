<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Peyk;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('master')->only('set_peyk');
    }

    public function index()
    {
        $transactions = Transaction::query();
        if (customer()) {
            $transactions = $transactions->where('customer_id', current_customer('id'));
        }
        if (peyk()) {
            $transactions = $transactions->where('peyk_id', current_peyk('id'));
        }
        $transactions = $transactions->paginate(20);
        return view('dashboard.transactions.index', compact('transactions'));
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
