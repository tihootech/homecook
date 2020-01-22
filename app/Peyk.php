<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peyk extends AccountOwner
{
    use SoftDeletes;
}
