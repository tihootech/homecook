<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['cost', 'rate', 'sells'];


    public function getRateAttribute()
    {
        return rand(0,500) / 100;
    }

    public function getCostAttribute()
    {
        return $this->discount ? dp($this->price, $this->discount) : $this->price;
    }

    public function getSellsAttribute()
    {
        return  rand(0, 100);
    }

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
        return route('show_food', [urf($this->title), $this->uid]);
    }
}
