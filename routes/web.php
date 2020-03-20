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

Route::post('organizations', 'OrganizationController@store')->name('organizations.store');

Route::middleware(['auth'])->group(function(){
    // Route::resource('organizations', 'OrganizationController');

	Route::get('organizations', 'OrganizationController@index')->name('organizations.index');
    Route::put('organizations/{organization}', 'OrganizationController@update')->name('organizations.update');
	Route::delete('organizations/{organization}', 'OrganizationController@destroy')->name('organizations.destroy');
    Route::get('organizations/{organization}', 'OrganizationController@show')->name('organizations.show');
    Route::get('organizations/{organization}/edit', 'OrganizationController@edit')->name('organizations.edit');
    

    Route::get('events', 'EventController@list')->name('events.list');
    Route::group(['prefix' => 'organizations/{organization}'], function(){
        Route::resource('events', 'EventController', [
            'as' => 'organizations',
        ]);
    });
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
