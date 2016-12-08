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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/register-ajax', 'UserController@create');
Route::get('/home', 'HomeController@index');
Route::resource('users', 'UserController');
Route::resource("tweets", "TweetController");
Route::get('/users', 'DatatablesController@index');
Route::any('/data', 'DatatablesController@anyData')->name('datatables.data');
