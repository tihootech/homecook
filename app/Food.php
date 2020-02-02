<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $appends = ['persian_type', 'cook_share'];

    public function getPersianTypeAttribute()
    {
        if ($this->type == 'food') {
            return 'غذا - پیش سفارش';
        }elseif ($this->type == 'product') {
            return 'محصول خانگی';
        }elseif ($this->type == 'online') {
            return 'غذا - سفارش لحظه ای';
        }else {
            return $this->type;
        }
    }

    public function getCookShareAttribute()
    {
        return percent($this->cost, settings('cook_percent'));
    }

    public static function getList()
    {
        return Food::select(
            'foods.*',
            \DB::raw('(price - ROUND((price * discount) / 100, 2 )) AS cost'),
            \DB::raw('CASE WHEN AVG(reviews.rate) IS NULL THEN 0 ELSE AVG(reviews.rate) END AS rate'),
            \DB::raw('SUM(transaction_items.count) AS sells')
        )->leftJoin('reviews', 'foods.id', '=', 'reviews.food_id')
        ->leftJoin('transaction_items', 'foods.id', '=', 'transaction_items.food_id');
    }

    public function getRate()
    {
        return Review::where('food_id', $this->id)->average('rate');
    }

    public function getCost()
    {
        return $this->discount ? dp($this->price, $this->discount) : $this->price;
    }

    public function getSells()
    {
        return  TransactionItem::where('food_id', $this->id)->wherePonied(1)->sum('count');
    }

	public function cook()
	{
		return $this->belongsTo(Cook::class);
	}

	public function cat()
	{
		return $this->belongsTo(Cat::class);
	}

    public function public_link()
    {
        return route('show_food', [urf($this->title), $this->uid]);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
