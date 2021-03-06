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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'PagesController@index');
Route::get('/About', 'PagesController@About');
Route::get('/test', 'PagesController@test');

Route::resource('post','PostController');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::post('/dashboard', 'DashboardController@test')->name('test.store');

