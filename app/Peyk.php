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
}
