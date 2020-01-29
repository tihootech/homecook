<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    // public function calc_cook_share()
    // {
    //     $total = $this->total;
    //     $pure_total = $total - settings('peyk_share');
    //     $tax = percent($pure_total, settings('tax'));
    //     $added_price = percent($pure_total, settings('added_price'));
    //     $cook_share = $pure_total - $tax - $added_price;
    //     return $cook_share;
    // }
    //
    // public function calc_master_share()
    // {
    //     $total = $this->total;
    //     $pure_total = $total - settings('peyk_share');
    //     return percent($pure_total, settings('added_price'));
    // }
    //
    // public function calc_tax()
    // {
    //     $total = $this->total;
    //     $pure_total = $total - settings('peyk_share');
    //     return percent($pure_total, settings('tax'));
    // }

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
		return $this->belongsTo(Customer::class);
	}

	public function peyk()
	{
		return $this->belongsTo(Peyk::class);
	}

	public function address()
	{
		return $this->belongsTo(Address::class);
	}

}
