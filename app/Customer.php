<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends AccountOwner
{
    public function primary_address()
    {
    	return $this->hasOne(Address::class)->wherePrimary(1);
    }

	public function other_addresses()
	{
		return $this->hasMany(Address::class)->wherePrimary(0);
	}

	public function all_addresses()
	{
		return $this->hasMany(Address::class)->wherePrimary(0);
	}
}
