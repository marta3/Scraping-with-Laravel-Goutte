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

Route::get('/', 'WebScraperController@getIndex');
Route::get('/index', 'WebScraperController@getIndex');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/wishlist', 'wishListController@show');
Route::get('wishlist/add/{product}/{urlima}', 'WishListController@add');
Route::get('wishlist/delete/{product}', 'WishListController@delete');
