<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $guarded = ['id'];
	public static $pages = [
        'home_page' => 'صفحه اصلی',
        'order_food' => 'سفارش غذا',
        'order_product' => 'فروشگاه',
        'blogs' => 'وبلاگ',
        'new_cook' => 'همکاری',
        'message' => 'پیام',
    ];
}
