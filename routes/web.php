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

Route::resource('/','App\Http\Controllers\DashboardController@index');

Route::resource('/products','App\Http\Controllers\ProductController');

Route::resource('/orders','App\Http\Controllers\OrderController');

Route::get('/confirm/{id}','App\Http\Controllers\OrderController@confirm')->name('orders.confirm');

Route::get('/pending/{id}','App\Http\Controllers\OrderController@pending')->name('orders.pending');

Route::resource('/users','App\Http\Controllers\UserController');

Route::get('/active/{id}','App\Http\Controllers\UserController@active')->name('users.active');

Route::get('/blocked/{id}','App\Http\Controllers\UserController@blocked')->name('users.blocked');

Route::get('/login', 'App\Http\Controllers\AdminUserController@index');

Route::post('/login', 'App\Http\Controllers\AdminUserController@store')->name('login');
});