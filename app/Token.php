<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    public static function make($mobile)
    {
    	$token = new self;
		$token->mobile = $mobile;
		$token->code = rand(100000,999999);
		$token->save();
		return $token;
    }
}
