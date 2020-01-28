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
            case 'cookmodifyaccept': return 'تایید درخواست اصلاح عضویت همکار'; break;
            case 'code': return 'کد تایید'; break;
            case 'newpeyk': return 'پیک جدید'; break;
            case 'setpeyk': return 'اطلاع به پیک'; break;
            // TODO: cookmodifyagain
            default: return $this->template; break;
        }
    }
}
