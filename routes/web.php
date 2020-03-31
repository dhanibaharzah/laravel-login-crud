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
    return view('auth/login');
});

Auth::routes(['verify' => true]); 
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);
Route::group(['prefix' => 'product'], function() {
    Route::get('/', 'ProductController@index');
    Route::post('/', 'ProductController@save');
    Route::get('/new', 'ProductController@create');
    Route::get('/{id}', 'ProductController@edit');
    Route::put('/{id}', 'ProductController@update');
    Route::delete('/{id}', 'ProductController@destroy');
});

Auth::routes(['verify' => true]); 
Route::group(['prefix' => 'crud'], function() {
    Route::get('/', 'CrudsController@index');
    Route::post('/', 'CrudsController@store');
    Route::get('/new', 'CrudsController@create');
    Route::get('/{id}', 'CrudsController@edit');
    Route::put('/{id}', 'CrudsController@update');
    Route::delete('/{id}', 'CrudsController@destroy');
});


Auth::routes(['verify' => true]);
Route::group(['prefix' => 'item'], function() {
    Route::get('/', 'ItemController@index');
    Route::post('/', 'ItemController@store');
    Route::get('/new', 'ItemController@create');
    Route::get('/{id}', 'ItemController@edit');
    Route::put('/{id}', 'ItemController@update');
    Route::delete('/{id}', 'ItemController@destroy');
});
