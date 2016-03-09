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
    return view('pages.dashboard');
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


Route::get ('rack', 'RackController@index');
Route::get ('rack/detail/{id}', 'RackController@detail');
Route::get ('rack/create', 'RackController@create');
Route::post('rack/create', array('before' => 'csrf', 'uses' => 'RackController@create'));
Route::get ('rack/update/{id}', 'RackController@update');
Route::post('rack/update/{id}', array('before' => 'csrf', 'uses' => 'RackController@update'));
Route::get ('rack/delete/{id}', 'RackController@delete');