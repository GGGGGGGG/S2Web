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

Route::get('/match', 'MatchController@index')->name('match.index');
Route::get('/match/{match}', 'MatchController@show')->name('match.show');
Route::post('/match', 'MatchController@search')->name('match.search');

Route::get('/server', 'ServerController@index')->name('server.index');
Route::get('/server/{server}', 'ServerController@show')->name('server.show');

Route::get('/stats', 'StatController@index')->name('stats.index');
Route::post('/stats', 'StatController@search')->name('stats.search');

Route::get('/stats/leaderboards', 'StatController@leaderboards')->name('stats.leaderboards');

Route::middleware('auth')->group(function () {
    Route::get('/user/edit', 'UserController@edit')->name('user.edit');
    Route::put('/user/{user}', 'UserController@update')->name('user.update');
});

Route::get('/user/{user}', 'UserController@show')->name('user.show');


Route::get('/banned', 'UserController@banned')->name('user.banned');