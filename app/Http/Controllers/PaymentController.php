<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Transaction;
use App\TransactionItem;
use App\Cook;
use App\Peyk;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('master');
    }

    public function payments()
    {
        $cook_ids = TransactionItem::wherePonied(1)->whereCookPonied(0)->distinct('cook_id')->pluck('cook_id')->toArray();
        $peyk_ids = Transaction::wherePonied(1)->whereNotNull('peyk_id')->wherePeykPonied(0)->distinct('peyk_id')->pluck('peyk_id')->toArray();
        $cooks = Cook::whereIn('id', $cook_ids)->get();
        $peyks = Peyk::whereIn('id', $peyk_ids)->get();
        return view('dashboard.payments.payments', compact('cooks', 'peyks'));
    }

    public function index()
    {
        $payments = Payment::latest()->paginate(20);
        return view('dashboard.payments.index', compact('payments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'owner_id' => 'required',
            'owner_type' => [
                'required',
                Rule::in([Cook::class, Peyk::class]),
            ],
            'ids' => 'required',
            'amount' => 'required|integer',
        ]);
        Payment::create($data);
        if ($request->owner_type == Cook::class) {
            TransactionItem::whereIn('id', explode(',', $request->ids) )->update([
                'cook_ponied' => true
            ]);
        }
        if ($request->owner_type == Peyk::class) {
            Transaction::whereIn('id', explode(',', $request->ids) )->update([
                'peyk_ponied' => true
            ]);
        }
        return back()->withMessage(__('SUCCESS'));
    }
}
