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
        \Blade::if('admin', function () {
            return user('type') == 'admin';
        });
        \Blade::if('admins', function () {
            return user('type') == 'master' || user('type') == 'admin';
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
        \Blade::if('peyk', function () {
            return peyk();
        });
        \Blade::if('not_master', function () {
            return !master();
        });
        \Blade::if('not_peyk', function () {
            return !peyk();
        });
        \Blade::if('master_or_peyk', function () {
            return peyk() || master();
        });
    }
}
