<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['type'];

    public function getTypeAttribute()
    {
        return $this->owner_type == Cook::class ? 'آشپز' : 'پیک';
    }

    public function owner()
    {
        return $this->morphTo();
    }
}
