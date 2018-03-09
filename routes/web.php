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
Route::get('/testt', function () {
    return view('layouts.main');
});
*/
/*
Route::get('/', 'PagesController@index');
Route::get('/test', 'PagesController@test');
Route::get('/about', 'PagesController@about');
//Route::get('/test', 'PagesController@test');



Auth::routes();
*/



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/*
Route::get('test', function (Google $google) {
    
    $result = $google->getBooks();
    print_r($result);

});
*/

$s = 'public.';
Route::get('/',         ['as' => $s . 'home',   'uses' => 'PagesController@index']);

Route::get('/about', 'PagesController@about');

Route::get('/hackHome', 'PagesController@hackHome');

Route::get('/test', 'PagesController@indexx');

Route::get('/dashboard', 'DashboardController@index');
//Route::post('/dashboard', 'DashboardController@test');
Route::get('/createPresentation', 'SlidesController@index');
Route::get('/createSlide', 'SlidesController@createSlide');
Route::resource('post','PostController');


Route::group(['prefix' => 'admin', 'middleware' => 'auth:administrator'], function()
{
    $a = 'admin.';
    Route::get('/', ['as' => $a . 'home', 'uses' => 'AdminController@getHome']);

});

Route::group(['prefix' => 'user', 'middleware' => 'auth:user'], function()
{
    $a = 'user.';
    Route::get('/', ['as' => $a . 'home', 'uses' => 'UserController@getHome']);

});


    $a = 'authenticated.';
    Route::get('/logout', ['as' => $a . 'logout', 'uses' => 'Auth\LoginController@logout']);


Auth::routes(['login' => 'auth.login']);


//SOCIAL REDIRECT FOR SOCIAL LOGIN
$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);

//Api client Oauth
Route::get('oauth', ['as' => 'oauthCallback', 'uses' => 'SlidesController@oauth']);
Route::get('oauth2', ['as' => 'oauthCallback2','uses'=> 'SlidesController@index']);


