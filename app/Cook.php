<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cook extends Model
{
    protected $guarded = ['id', 'active', 'fresh'];

    public function full_name()
    {
        return $this->first_name .' '. $this->last_name;
    }
}
