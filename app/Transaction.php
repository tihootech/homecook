<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ['id'];

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

}
