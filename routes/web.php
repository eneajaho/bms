<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::resource('products', 'ProductsController');
Route::resource('tables', 'TablesController');
Route::resource('category', 'CategoryController');
Route::resource('notification', 'NotificationController');
Route::resource('orders', 'OrderController');




Route::get('/magazina', 'ProductsController@index');
Route::get('/', 'ProductsController@index');
