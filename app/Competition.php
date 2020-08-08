<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $guarded = ['id'];

    public function competitives($value='')
    {
        return $this->hasMany(Competitive::class);
    }

    public function winner($i)
    {
        $var = "rank_{$i}";
        $competitive = Competitive::find($this->$var);
        return $competitive->full_name ?? null;
    }
}
