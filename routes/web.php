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

// cart
Route::post('cart/add', 'CartController@add')->name('cart.add');
Route::post('cart/register', 'CartController@register')->name('cart.register');
Route::post('cart/login', 'CartController@login')->name('cart.login');
Route::get('checkout', 'CartController@checkout')->name('cart.checkout');
Route::get('cart/code/{uid}', 'CartController@code')->name('cart.code');
Route::get('cart/address/{uid}', 'CartController@address')->name('cart.address');
Route::get('cart/review/{tuid}', 'CartController@review')->name('cart.review');
Route::post('cart/activate/{uid}', 'CartController@activate')->name('cart.activate');
Route::post('cart/finalize', 'CartController@finalize')->name('cart.finalize');
Route::post('cart/finish', 'CartController@finish')->name('cart.finish');
Route::post('cart/destroy/{uid}', 'CartController@destroy')->name('cart.destroy');

// general
Route::get('landing/message', 'LandingController@message')->name('landing.message');

// cooks
Route::get('همکاری', 'LandingController@new_cook')->name('new_cook');
Route::get('آشپز/{name}/{uid}', 'LandingController@show_cook')->name('show_cook');
Route::get('cook/fresh', 'CookController@fresh_requests')->name('cook.fresh_requests');
Route::get('cook/edit/{uid}', 'CookController@cook_edit')->name('cook.cook_edit');
Route::put('cook/update/{uid}', 'CookController@cook_update')->name('cook.cook_update');
Route::post('cook/accept/{cook}', 'CookController@accept')->name('cook.accept');
Route::post('cook/modify/{cook}', 'CookController@modify')->name('cook.modify');
Route::resource('cook', 'CookController');

// text messages
Route::get('text-messages', 'TextMessageController@index')->name('text_messages');

// foods
Route::resource('food', 'FoodController');
Route::get('سفارش-غذا/{order?}', 'LandingController@order_food')->name('order_food');
Route::get('غذا/{title}/{uid}', 'LandingController@show_food')->name('show_food');
Route::post('food/confirm_all', 'FoodController@confirm_all')->name('food.confirm_all');
Route::put('food/{food}/confirm', 'FoodController@confirm')->name('food.confirm');

// comment
Route::put('comment/{comment}/confirm', 'CommentController@confirm')->name('comment.confirm');
Route::post('comment/confirm_all', 'CommentController@confirm_all')->name('confirm_all_comments');
Route::resource('comment', 'CommentController')->except(['show', 'create']);

// blogs
Route::resource('blog', 'BlogController')->except('show');
Route::get('وبلاگ', 'LandingController@blogs')->name('blogs');
Route::get('{title}', 'LandingController@show_blog')->name('show_blog');
