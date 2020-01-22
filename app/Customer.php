<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\TextMessageController;

class Customer extends AccountOwner
{
    use SoftDeletes;

    public function primary_address()
    {
    	return $this->hasOne(Address::class)->wherePrimary(1);
    }

	public function other_addresses()
	{
		return $this->hasMany(Address::class)->wherePrimary(0);
	}

	public function all_addresses()
	{
		return $this->hasMany(Address::class);
	}

    public function add_address($body)
    {
        $address = Address::create([
            'customer_id' => $this->id,
            'body' => $body,
            'primary' => true,
        ]);
        $address->set_as_primary();
        return $address;
    }

    public static function make($data)
    {
        $user = new User;
        $user->username = $data['username'];
        $user->password = $data['password'];
        $user->save();
        \Auth::login($user);

        $customer = new Customer;
        $customer->uid = rs();
        $customer->user_id = $user->id;
        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->mobile = $data['mobile'];
        $customer->save();

        $found = Token::whereMobile($data['mobile'])->first();
        if (!$found) {
            $code = rand(100000,999999);
            $token = new Token;
            $token->mobile = $customer->mobile;
            $token->code = $code;
            $token->save();
        }else {
            $token = $found;
        }

        TextMessageController::store('code', $customer->mobile, $token->code);

        return $customer;
    }
}
