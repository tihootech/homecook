<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peyk extends AccountOwner
{
    use SoftDeletes;

    public static function createUserAccount($username, $password)
    {
        $user = new User;
        $user->username = $username;
        $user->password = bcrypt($password);
        $user->type = 'peyk';
        $user->save();
        return $user;
    }

    public function total_income()
    {
        return Transaction::where('peyk_id', $this->id)->sum('peyk_share');
    }

    public function balance()
    {
        return Transaction::where('peyk_id', $this->id)->where('peyk_ponied', 0)->sum('peyk_share');
    }

}
