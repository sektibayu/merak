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

Route::get ('user', 'UserController@index');
Route::get ('user/detail/{id}', 'UserController@detail');
Route::get ('user/create', 'UserController@create');
Route::post('user/create', array('before' => 'csrf', 'uses' => 'UserController@create'));
Route::get ('user/update/{id}', 'UserController@update');
Route::post('user/update/{id}', array('before' => 'csrf', 'uses' => 'UserController@update'));
Route::get ('user/delete/{id}', 'UserController@delete');

Route::get ('status', 'StatusController@index');
Route::get ('status/detail/{id}', 'StatusController@detail');
Route::get ('status/create', 'StatusController@create');
Route::post('status/create', array('before' => 'csrf', 'uses' => 'StatusController@create'));
Route::get ('status/update/{id}', 'StatusController@update');
Route::post('status/update/{id}', array('before' => 'csrf', 'uses' => 'StatusController@update'));
Route::get ('status/delete/{id}', 'StatusController@delete');

Route::get ('item', 'ItemController@index');
Route::get ('item/detail/{id}', 'ItemController@detail');
Route::get ('item/create', 'ItemController@create');
Route::post('item/create', array('before' => 'csrf', 'uses' => 'ItemController@create'));
Route::get ('item/update/{id}', 'ItemController@update');
Route::post('item/update/{id}', array('before' => 'csrf', 'uses' => 'ItemController@update'));
Route::get ('item/delete/{id}', 'ItemController@delete');

Route::get ('transaction', 'TransactionController@index');
Route::get ('transaction/detail/{id}', 'TransactionController@detail');
Route::get ('transaction/create', 'TransactionController@create');
Route::post('transaction/create', array('before' => 'csrf', 'uses' => 'TransactionController@create'));
Route::get ('transaction/update/{id}', 'TransactionController@update');
Route::post('transaction/update/{minmax}/{id}', array('before' => 'csrf', 'uses' => 'TransactionController@update'));
Route::get ('transaction/delete/{id}', 'TransactionController@delete');

Route::get('kartubarang', 'KartuBarangController@index');
Route::get ('kartubarang/detail/{id}', 'KartuBarangController@detail');
Route::post('kartubarang/detail/{id}', array('before'=>'csrf','uses'=> 'KartuBarangController@detail'));
Route::get ('kartubarang/create', 'KartuBarangController@create');
Route::post('kartubarang/create', array('before' => 'csrf', 'uses' => 'KartuBarangController@create'));
Route::get ('kartubarang/update/{id}', 'KartuBarangController@update');
Route::post('kartubarang/update/{id}', array('before' => 'csrf', 'uses' => 'KartuBarangController@update'));
Route::get ('kartubarang/delete/{id}', 'KartuBarangController@delete');
Route::get ('kartubarang/delTransaction/{id}', 'KartuBarangController@delTransaction');

Route::get('registrasibarang', 'RegistrasiBarangController@index');

Route::get ('ekstra', 'EkstraController@index');
Route::get ('ekstra/printsaldo', 'EkstraController@exportLaravel');
Route::get ('ekstra/printbon', array('before' => 'csrf', 'uses' => 'EkstraController@printbon'));

Route::get ('porm', 'PORMController@index');

