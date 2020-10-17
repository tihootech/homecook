<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'acc_verified_at' => 'datetime',
    ];


    public function persian_type()
    {
        switch ($this->type) {
            case 'cook': return 'همکار'; break;
            case 'customer': return 'مشتری'; break;
            case 'peyk': return 'پیک'; break;
            default: return strtoupper($this->type); break;
        }
    }

    public function owner()
    {
        return $this->hasOne(class_name($this->type), 'user_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function full_name()
    {
        $class = class_name($this->type);
        if (class_exists($class)) {
            $object = $class::where('user_id', $this->id)->first();
            if ($object) {
                return $object->full_name() ?? '';
            }else {
                return '';
            }
        }else {
            return '';
        }
    }
}
