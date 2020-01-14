<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextMessage extends Model
{
    protected $guarded = ['id'];

    public function persian_type()
    {
        switch ($this->template) {
            case 'cookaccept': return 'تایید عضویت همکار'; break;
            case 'cookmodify': return 'درخواست اصلاح عضویت همکار'; break;
            default: return $this->template; break;
        }
    }
}
