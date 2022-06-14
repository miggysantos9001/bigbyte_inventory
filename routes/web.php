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

Route::get('/','LoginController@index')->name('login1');
Route::post('login-new','LoginController@store')->name('pasok');
Route::get('logout','LoginController@logout')->name('gawas');

Route::get('/dashboard','DashboardController@index')->name('dashboard.index');
Route::get('/dashboard/changepassword/{id}','DashboardController@view_changepassword');
Route::post('/dashboard/changepassword/{id}','DashboardController@post_changepassword');

Route::get('loadsubtwo','ProductController@loadsubtwo');
Route::get('loadsubtwo_lf','ProductController@loadsubtwo_lf');
Route::get('loadsubone','ProductController@loadsubone');
Route::get('loadproducts','ProductController@loadproducts');

Route::post('/product-request/add-to-cart/','ProductRequestController@addtoCart')->name('product-request.cart');
Route::resource('/product-requests','ProductRequestController');



