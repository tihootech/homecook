<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Blade::if('master', function () {
            return master();
        });
        \Blade::if('cook', function () {
            return cook();
        });
        \Blade::if('active_cook', function () {
            return active_cook();
        });
        \Blade::if('customer', function () {
            return customer();
        });
    }
}
