<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $appends = ['cost', 'rate', 'sells', 'persian_type'];

    public function getPersianTypeAttribute()
    {
        if ($this->type == 'food') {
            return 'غذا';
        }elseif ($this->type == 'product') {
            return 'محصول خانگی';
        }else {
            return $this->type;
        }
    }

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
        return  Transaction::where('food_id', $this->id)->wherePonied(1)->sum('count');
    }

	public function cook()
	{
		return $this->belongsTo(Cook::class);
	}

    public function public_link()
    {
        return route('show_food', [urf($this->title), $this->uid]);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
