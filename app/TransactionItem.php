<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $guarded = ['id'];

	public function transaction()
	{
		return $this->belongsTo(Transaction::class);
	}

    public function owner()
    {
        return $this->morphTo();
    }
}
