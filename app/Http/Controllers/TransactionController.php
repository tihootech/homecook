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
        $transactions = $transactions->paginate(20);
        return view('dashboard.transactions.index', compact('transactions'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Transaction $transaction)
    {
        //
    }

    public function edit(Transaction $transaction)
    {
        //
    }

    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    public function destroy(Transaction $transaction)
    {
        //
    }

    public function set_peyk(Transaction $transaction, Request $request)
    {
        $peyk = Peyk::findOrFail($request->peyk);
        $transaction->peyk_id = $peyk->id;
        $transaction->save();
        TextMessageController::store('setpeyk', $peyk->mobile, [route('peyk.view_transaction', $transaction->uid)]);
        return back()->withMessage(__('SUCCESS'));
    }
}
