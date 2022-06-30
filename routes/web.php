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

Route::resource('products','ProductController');

// Product Requisition

Route::get('/product-request/remove-to-cart/{id}','ProductRequestController@removetoCart')->name('product-request.remove-to-cart');
Route::get('/product-request/delete-request-item/{id}','ProductRequestController@delete_request_item')->name('product-request.delete-request-item');
Route::get('/product-request/approve-request/{id}','ProductRequestController@approveRequest')->name('product-request.approve-request');
Route::get('/product-request/create-request','ProductRequestController@createRequest')->name('product-request.create-request');

Route::post('/product-request/approve-request/{id}','ProductRequestController@store_approveRequest');
Route::post('/product-request/add-to-cart/','ProductRequestController@addtoCart')->name('product-request.cart');
Route::post('/product-request/create-request','ProductRequestController@storeRequest');
Route::resource('/product-requests','ProductRequestController');

// Inventory
Route::get('/product-inventory','InventoryController@index')->name('inventory.index');
Route::post('/product-inventory','InventoryController@getResult');
Route::post('/product-inventory/print-result','InventoryController@printResult');

// Missing Damage
Route::get('/product-missing-damage/delete-entry/{id}','ProductMissingDamageController@delete')->name('lost.delete');
Route::resource('/product-missing-damages','ProductMissingDamageController');

