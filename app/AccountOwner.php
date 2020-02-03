<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountOwner extends Model
{
	protected $guarded = ['id'];

	public function full_name()
    {
        return $this->first_name .' '. $this->last_name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

	public function transactions()
	{
		$type = $this->user->type ?? '';
		return $this->hasMany(Transaction::class, "{$type}_id")->latest();
	}

	public function dashboard_link()
	{
		return route('user.show', $this->user_id);
	}
}
