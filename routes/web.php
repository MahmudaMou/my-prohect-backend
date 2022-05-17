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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Administrative')->middleware('auth')->prefix('administrative')->name('administrative.')
    ->group(function () {

        Route::prefix('item')->group(function () {
            Route::get('/','ItemController@index')->name('item');
            Route::get('item-data', 'ItemController@data')->name('item.data');
            Route::get('create', 'ItemController@create')->name('item.create');
            Route::get('edit/{id}', 'ItemController@edit')->name('item.edit');
            Route::put('update/{id}', 'ItemController@update')->name('item.update');
            Route::get('view/{id}', 'ItemController@show')->name('item.view');
            Route::post('create', 'ItemController@store')->name('item.store');
            Route::delete('delete/{id}', 'ItemController@destroy')->name('item.destroy');
        });


    });
