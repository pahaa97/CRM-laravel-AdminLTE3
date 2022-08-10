<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'auth'], function () {
    Route::get('/home', 'IndexController')->name('home');

    Route::group(['namespace' => 'Company', 'prefix' => 'company'], function () {
        Route::get('/', 'IndexController')->name('company.index');
        Route::get('/create', 'CreateController')->name('company.create');
        Route::post('/', 'StoreController')->name('company.store');
        Route::get('/{company}', 'ShowController')->name('company.show')->middleware('company');
        Route::get('/{company}/edit', 'EditController')->name('company.edit')->middleware('company');
        Route::patch('/{company}', 'UpdateController')->name('company.update')->middleware('company');
        Route::delete('/{company}', 'DeleteController')->name('company.delete')->middleware('company');
    });

    Route::group(['namespace' => 'Client', 'prefix' => 'client'], function () {
        Route::get('/', 'IndexController')->name('client.index');
        Route::get('/create', 'CreateController')->name('client.create');
        Route::post('/', 'StoreController')->name('client.store');
        Route::get('/{client}', 'ShowController')->name('client.show')->middleware('client');
        Route::get('/{client}/edit', 'EditController')->name('client.edit')->middleware('client');
        Route::patch('/{client}', 'UpdateController')->name('client.update')->middleware('client');
        Route::delete('/{client}', 'DeleteController')->name('client.delete')->middleware('client');
    });
});
