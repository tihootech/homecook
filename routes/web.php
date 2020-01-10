<?php

// default laravel
Route::get('/', 'LandingController@index');
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

// general
Route::get('landing/message', 'LandingController@message')->name('landing.message');

// همکاری
Route::get('همکاری', 'LandingController@new_cook')->name('new_cook');
Route::resource('cook', 'CookController');
