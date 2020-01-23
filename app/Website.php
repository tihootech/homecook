<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $guarded = ['id'];

    public function columns()
    {
        $cols = explode('&&&', $this->cols);
        $output = [];
        foreach ($cols as $col) {
            $output []= explode('&&', $col);
        }
        return $output;
    }
}
