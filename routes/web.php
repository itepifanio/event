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


Route::middleware(['auth'])->group(function(){
    Route::resource('organizations', 'OrganizationController');

    Route::get('events', 'EventController@list')->name('events.list');
    Route::group(['prefix' => 'organizations/{organization}'], function(){
        Route::resource('events', 'EventController', [
            'as' => 'organizations',
        ]);
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
