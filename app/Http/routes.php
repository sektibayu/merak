<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('pages/dashboard');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
// user
Route::get('user','UserController@index');
Route::get('user/create','UserController@create');
// Route::post('user/create', array('before' => 'CSRF', 'uses' => 'UserController@store'));
Route::post('user/create', 'UserController@store');
Route::get('user/update/{id}','UserController@update');
Route::post('user/update/{id}', array('before' => 'CSRF', 'uses' => 'UserController@update'));
Route::get('user/delete/{id}','UserController@delete');

// status
Route::get('status','StatusController@index');
Route::get('status/create','StatusController@create');
// Route::post('status/create', array('before' => 'CSRF', 'uses' => 'StatusController@create'));
Route::post('status/create', 'StatusController@store');
Route::get('status/update/{id}','StatusController@update');
Route::post('status/update/{id}', array('before' => 'CSRF', 'uses' => 'StatusController@update'));
Route::get('status/delete/{id}','StatusController@delete');

Route::get('user/lalala','UserController@lalala');