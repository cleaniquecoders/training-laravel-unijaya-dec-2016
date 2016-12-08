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

Route::get('/phpexcel', function () {
    Excel::create('New file', function ($excel) {
        $excel->sheet('New sheet', function ($sheet) {
            $users = App\User::all();
            $sheet->loadView('exports.excel.users.index', compact('users'));
        });
    })->download('xls');
});

Auth::routes();
Route::get('/register-ajax', 'UserController@create');
Route::get('/home', 'HomeController@index');
Route::resource('users', 'UserController');
Route::resource("tweets", "TweetController");
Route::get('/users', 'DatatablesController@index');
Route::any('/data', 'DatatablesController@anyData')->name('datatables.data');
