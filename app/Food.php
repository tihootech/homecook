<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $guarded = ['id'];

	public function cook()
	{
		return $this->belongsTo(Cook::class);
	}

	public function cost()
	{
		return $this->discount ? dp($this->price, $this->discount) : $this->price;
	}

    public function public_link()
    {
        return route('show_food', urf($this->title));
    }
}
