<?php

// default laravel
Route::get('/', 'LandingController@index')->name('index');
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

// customize laravel acc login pattern
Route::get('register', 'CustomAccController@register_form')->name('acc.register');
Route::post('password/forget', 'CustomAccController@forget_password')->name('acc.forget');
Route::post('acc/code/send/{user}', 'CustomAccController@send_code')->name('acc.send_code');
Route::get('acc/code/enter/{user}', 'CustomAccController@enter_code')->name('acc.enter_code');
Route::post('acc/password/reset/{user}', 'CustomAccController@reset_password')->name('acc.reset_password');

// general user account control
Route::get('acc', 'AccController@edit')->name('acc');
Route::put('acc', 'AccController@update')->name('acc_update');
Route::get('user/list', 'AccController@list')->name('user.list');
Route::get('user/{user}', 'AccController@show')->name('user.show');
Route::delete('user/{user}', 'AccController@destroy')->name('user.destroy');
Route::put('user/{user}', 'AccController@master_update')->name('user.master_update');

// categories
Route::resource('cat', 'CatController')->except(['create', 'show', 'edit']);

// settings and website management
Route::get('website/manage', 'WebsiteController@general_management')->name('website.general');
Route::get('website/settings', 'WebsiteController@settings')->name('website.settings');
Route::get('website/slides', 'WebsiteController@slides')->name('website.slides');
Route::put('website/settings', 'WebsiteController@update_settings')->name('settings.update');
Route::put('website/manage', 'WebsiteController@update_website')->name('website.update');
Route::put('website/slides/{slide}', 'WebsiteController@update_slides')->name('slides.update');
Route::delete('website/slides/{slide}', 'WebsiteController@destroy_slides')->name('slides.destroy');
Route::get('website/slides/{slide}', 'WebsiteController@edit_slides')->name('slides.edit');
Route::post('website/slides', 'WebsiteController@store_slides')->name('slides.store');

// cart
Route::post('cart/add', 'CartController@add')->name('cart.add');
Route::post('cart/register', 'CartController@register')->name('cart.register');
Route::post('cart/login', 'CartController@login')->name('cart.login');
Route::get('checkout', 'CartController@checkout')->name('cart.checkout');
Route::get('cart/code/{uid}/{in_cart}', 'CartController@code')->name('cart.code');
Route::get('cart/address/{uid}', 'CartController@address')->name('cart.address');
Route::get('cart/review/{tuid}', 'CartController@review')->name('cart.review');
Route::post('cart/activate/{uid}', 'CartController@activate')->name('cart.activate');
Route::post('cart/finalize', 'CartController@finalize')->name('cart.finalize');
Route::post('cart/finish/{tuid}', 'CartController@finish')->name('cart.finish');
Route::post('cart/destroy/{uid}', 'CartController@destroy')->name('cart.destroy');
Route::post('cart/send/again/{mobile}', 'CartController@send_again')->name('cart.send_again');

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

// foods & products
Route::resource('food', 'FoodController');
Route::get('سفارش-غذا/{order?}', 'LandingController@order')->name('order_food');
Route::get('محصولات-خانگی/{order?}', 'LandingController@order')->name('order_product');
Route::get('جستجو', 'LandingController@search')->name('search');
Route::get('غذا/{title}/{uid}', 'LandingController@show_food')->name('show_food');
Route::post('food/confirm_all', 'FoodController@confirm_all')->name('food.confirm_all');
Route::put('food/{food}/confirm', 'FoodController@confirm')->name('food.confirm');

// other routes
Route::get('landing/message', 'LandingController@message')->name('landing.message');
Route::post('transaction/{transaction}/peyk', 'TransactionController@set_peyk')->name('transaction.set_peyk');

// peygiri
Route::get('order/{type}/{tuid}', 'LandingController@view_transaction')->name('view_transaction');

// other resources
Route::resource('review', 'ReviewController');
Route::post('review/{review}/accept', 'ReviewController@accept')->name('review.accept');
Route::resource('peyk', 'PeykController')->except('show');
Route::get('transaction', 'TransactionController@index')->name('transaction.index');
Route::get('transaction/{transaction}', 'TransactionController@show')->name('transaction.show');

// payments
Route::get('payments', 'PaymentController@payments')->name('payments');
Route::resource('payment', 'PaymentController')->only(['index', 'store']);

// ajaxes
Route::get('ajax/state', 'AjaxController@state_change')->name('state_change');

// comment
Route::put('comment/{comment}/confirm', 'CommentController@confirm')->name('comment.confirm');
Route::post('comment/confirm_all', 'CommentController@confirm_all')->name('confirm_all_comments');
Route::resource('comment', 'CommentController')->except(['show', 'create']);

// other
Route::get('قوانین-و-مقررات', 'LandingController@rnr')->name('rnr');

// blogs
Route::resource('blog', 'BlogController')->except('show');
Route::get('وبلاگ', 'LandingController@blogs')->name('blogs');
Route::get('{title}', 'LandingController@show_blog')->name('show_blog');
