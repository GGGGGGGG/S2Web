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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/download', 'DownloadController@index')->name('download.index');
Route::get('/download/{category}', 'DownloadController@show')->name('download.show');

Route::get('/server', 'ServerController@index')->name('server.index');
Route::get('/server/{server}', 'ServerController@show')->name('server.show');

Route::middleware('auth')->group(function () {
    Route::get('/user/edit', 'UserController@edit')->name('user.edit');
    Route::put('/user/{user}', 'UserController@update')->name('user.update');
});

Route::get('/user/{user}', 'UserController@show')->name('user.show');


Route::get('/banned', 'UserController@banned')->name('user.banned');