<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = ['id'];
	protected $appends = ['cook_percent'];

	public function getCookPercentAttribute()
	{
		return 100 - $this->tax - $this->added_price;
	}
}
