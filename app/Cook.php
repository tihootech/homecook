<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cook extends AccountOwner
{
    use SoftDeletes;
    protected $appends = ['state', 'city'];

    public function getStateAttribute()
    {
        return $this->state_object->name ?? '-';
    }

    public function getCityAttribute()
    {
        return $this->city_object->name ?? '-';
    }

    public function state_object()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city_object()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function accept()
    {
        $this->active = 1;
        $this->fresh = 0;
        $this->modify_reason = null;
        $this->save();
    }

    public function modify($reason)
    {
        $this->fresh = 0;
        $this->modify_reason = $reason;
        $this->save();
    }

    public function create_user_acount()
    {
        $password = rand(1000,9999);

        $user = new User;
        $user->username = $this->mobile;
        $user->password = bcrypt($password);
        $user->acc_verified_at = Carbon::now();
        $user->type = 'cook';
        $user->save();

        $this->user_id = $user->id;
        $this->save();

        return $password;
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function public_link()
    {
        return route('show_cook', [urf($this->full_name()), $this->uid]);
    }

    public function total_income()
    {
        return TransactionItem::where('cook_id', $this->id)->sum('cook_share');
    }

    public function balance()
    {
        return TransactionItem::where('cook_id', $this->id)->where('cook_ponied', 0)->sum('cook_share');
    }

    public function payment_ids()
    {
        return implode(',', TransactionItem::where('cook_id', $this->id)->where('cook_ponied', 0)->pluck('id')->toArray());
    }

}
