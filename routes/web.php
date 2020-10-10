<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

//Route::post('organizations', [OrganizationController::class, 'store'])->name('organizations.store');

Route::middleware(['auth'])->group(function(){
    Route::resource('organizations', OrganizationController::class)->except(['store']);
    Route::get('events', [EventController::class, 'list'])->name('events.list');
    Route::group(['prefix' => 'organizations/{organization}'], function(){
        Route::resource('events', EventController::class, [
            'as' => 'organizations',
        ]);
    });
    Route::group(['prefix' => 'events/{event}'], function(){
        Route::resource('subscription', SubscriptionsController::class, [
            'as' => 'events',
        ]);
    });

});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
