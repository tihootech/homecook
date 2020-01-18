<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = ['id'];
	protected $appends = ['master_share'];

	public function getMasterShareAttribute()
	{
		return 100 - $this->cook_share;
	}
}
