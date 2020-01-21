<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $guarded = ['id'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
