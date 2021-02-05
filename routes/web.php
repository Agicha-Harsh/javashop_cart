<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function(){
	Route::middleware('auth:admin')->group(function(){

		Route::resource('/','App\Http\Controllers\DashboardController');

Route::resource('/products','App\Http\Controllers\ProductController');

Route::resource('/orders','App\Http\Controllers\OrderController');

Route::get('/confirm/{id}','App\Http\Controllers\OrderController@confirm')->name('orders.confirm');

Route::get('/pending/{id}','App\Http\Controllers\OrderController@pending')->name('orders.pending');

Route::resource('/users','App\Http\Controllers\UserController');

Route::get('/active/{id}','App\Http\Controllers\UserController@active')->name('users.active');

Route::get('/blocked/{id}','App\Http\Controllers\UserController@blocked')->name('users.blocked');

Route::get('/logout','App\Http\Controllers\AdminUserController@logout');
	});


Route::get('/login', 'App\Http\Controllers\AdminUserController@index');

Route::post('/login', 'App\Http\Controllers\AdminUserController@store')->name('login');
	


});

Route::prefix('front')->group(function(){
	Route::get('/','App\Http\Controllers\Front\HomeController@index');

	Route::get('/user/register','App\Http\Controllers\Front\RegistrationController@index');

	Route::post('/user/register','App\Http\Controllers\Front\RegistrationController@store');

	Route::get('/user/profile','App\Http\Controllers\Front\UserProfileController@index');

	Route::get('/user/login','App\Http\Controllers\Front\SessionsController@index');

	Route::post('/user/login','App\Http\Controllers\Front\SessionsController@store');

	Route::get('/user/logout','App\Http\Controllers\Front\SessionsController@logout');

	Route::post('/user/edit/{id}','App\Http\Controllers\Front\UserProfileController@edit')->name('user.edit');

	Route::post('/user/update/{id}','App\Http\Controllers\Front\UserProfileController@update')->name('user.update');

	Route::get('/user/order/{id}','App\Http\Controllers\Front\UserProfileController@show');

	Route::get('/cart','App\Http\Controllers\Front\CartController@index');

	Route::post('/cart','App\Http\Controllers\Front\CartController@store')->name('cart');

	Route::delete('cart/remove/{product}','App\Http\Controllers\Front\CartController@destroy')->name('cart.destroy');

	Route::post('cart/savelater/{product}','App\Http\Controllers\Front\CartController@savelater')->name('cart.savelater');

	Route::delete('/savelater/destroy/{product}','App\Http\Controllers\Front\SaveLaterController@destroy')->name('savelater.destroy');

	Route::post('savelater/moveToCart/{product}','App\Http\Controllers\Front\SaveLaterController@moveToCart')->name('moveToCart');

	Route::get('/checkout','App\Http\Controllers\Front\CheckoutController@index');

	Route::post('/checkout','App\Http\Controllers\Front\CheckoutController@store')->name('checkout');

	Route::get('/empty', function(){
		Cart::instance('default')->destroy();
	});
});