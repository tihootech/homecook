<?php

// default laravel
Route::get('/', 'LandingController@index')->name('index');
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

// general user account control
Route::get('acc', 'AccController@edit')->name('acc');
Route::put('acc', 'AccController@update')->name('acc_update');
Route::get('user/list', 'AccController@list')->name('user.list');
Route::get('user/{user}', 'AccController@show')->name('user.show');
Route::delete('user/{user}', 'AccController@destroy')->name('user.destroy');
Route::put('user/{user}', 'AccController@master_update')->name('user.master_update');

// general
Route::get('landing/message', 'LandingController@message')->name('landing.message');

// cooks
Route::get('همکاری', 'LandingController@new_cook')->name('new_cook');
Route::get('cook/fresh', 'CookController@fresh_requests')->name('cook.fresh_requests');
Route::get('cook/edit/{uid}', 'CookController@cook_edit')->name('cook.cook_edit');
Route::put('cook/update/{uid}', 'CookController@cook_update')->name('cook.cook_update');
Route::post('cook/accept/{cook}', 'CookController@accept')->name('cook.accept');
Route::post('cook/modify/{cook}', 'CookController@modify')->name('cook.modify');
Route::resource('cook', 'CookController');

// text messages
Route::get('text-messages', 'TextMessageController@index')->name('text_messages');
