<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = ['id'];

    public function set_as_primary()
    {
        self::where('customer_id', $this->customer_id)->where('id', '<>', $this->id)->update([
            'primary' => 0
        ]);
        $this->primary = 1;
        $this->save();
    }
}
