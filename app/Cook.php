<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cook extends Model
{
    protected $guarded = ['id', 'active', 'fresh'];

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

    public function full_name()
    {
        return $this->first_name .' '. $this->last_name;
    }
}
