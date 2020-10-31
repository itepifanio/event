<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RhController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
        ])->only(['index', 'edit', 'update','store','create'])
            ->middleware('hasRole:admin,owner')
            ->middleware('hasStatus:active')
            ->parameters(['rh' => 'user']);
        
        Route::get('/rh/{user}/confirm', [RhController::class, 'show'])->name('organizations.rh.confirm');
        Route::post('/rh/{user}/confirm', [RhController::class, 'confirm'])->name('organizations.rh.confirm');
            
        Route::group(['prefix' => 'events/{event}'], function (){
            Route::get('attendances', [AttendanceController::class, 'index'])->name('organizations.events.attendances.index');
            Route::put('attendances', [AttendanceController::class, 'update'])->name('organizations.events.attendances.update');
            Route::get('attendances/edit', [AttendanceController::class, 'edit'])->name('organizations.events.attendances.edit');
        });
    });

    Route::group(['prefix' => 'events/{event}'], function(){
        Route::resource('subscription', SubscriptionsController::class, [
            'as' => 'events',
        ])->except(['create', 'edit', 'update', 'show']);
    });
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
