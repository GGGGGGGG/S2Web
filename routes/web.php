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

Route::get('/user/{user}', 'UserController@show')->name('user.show');
Route::get('/user/{user}/edit', 'UserController@edit')->name('user.edit');


Route::middleware('auth')->group(function () {
    Route::put('/user/{user}', 'UserController@update')->name('user.update');
});

Route::middleware('banned')->group(function () {
    Route::get('/banned', 'UserController@banned')->name('user.banned');
});