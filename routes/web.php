<?php

// default laravel
Route::get('/', 'LandingController@index');
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
