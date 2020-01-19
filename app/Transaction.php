<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ['id'];

	public function food()
	{
		return $this->belongsTo(Food::class);
	}

	public function cook()
	{
		return $this->belongsTo(Cook::class);
	}

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
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
