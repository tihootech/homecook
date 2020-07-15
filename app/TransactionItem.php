<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $guarded = ['id'];

    public function food()
	{
		return $this->belongsTo(Food::class)->withTrashed();
	}

	public function cook()
	{
		return $this->belongsTo(Cook::class)->withTrashed();
	}

    public function transaction()
    {
        return $this->belongsTo(Transaction::class)->withTrashed();
    }
}
