<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\RhController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('organizations', [OrganizationController::class, 'store'])->name('organizations.store');

Route::middleware(['auth'])->group(function () {
    Route::resource('profile', ProfileController::class)->only('edit', 'update');

    Route::resource('organizations', OrganizationController::class)->except(['store']);
    Route::get('events', [EventController::class, 'list'])->name('events.list');

    Route::group(['prefix' => 'organizations/{organization}'], function () {
        Route::resource('events', EventController::class, [
            'as' => 'organizations',
        ]);
        Route::resource('rh', RhController::class, [
            'as' => 'organizations',
        ])->only(['index', 'edit', 'update'])
            ->middleware('hasRole:admin,owner')
            ->parameters(['rh' => 'user']);
    });
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
