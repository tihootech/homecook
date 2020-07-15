<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Transaction extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $appends = ['sum'];

    public function getSumAttribute()
    {
        return $this->total + $this->peyk_share;
    }

    public function update_changes_to_cart()
    {
        $this->peyk_share = $this->count_cooks() * settings('peyk_share');
        $this->total = TransactionItem::where('transaction_id', $this->id)->sum('payable');
        $this->save();
    }

    public function count_cooks()
    {
        return TransactionItem::where('transaction_id', $this->id)->distinct('cook_id')->count();
    }

    public static function make()
    {
        $transaction = new self;
        $transaction->uid = rs();
        $transaction->save();
        return $transaction;
    }

    public function items()
    {
        return $this->hasMany(TransactionItem::class);
    }

	public function customer()
	{
		return $this->belongsTo(Customer::class)->withTrashed();
	}

	public function peyk()
	{
		return $this->belongsTo(Peyk::class)->withTrashed();
	}

	public function address()
	{
		return $this->belongsTo(Address::class);
	}

    public function generate_delivery($type='english')
    {
        $now = Carbon::now();
        $start = '00:00:00';
        $end   = '18:00:00';
        $time  = $now->format('H:i:s');
        $days = ($time >= $start && $time <= $end) ? 1 : 2;
        $delivery = $now->addDays($days);
        return $type == 'persian' ? human_date($delivery) : $delivery;
    }
}
