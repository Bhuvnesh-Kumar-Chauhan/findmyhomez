<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\auth\Authcontroller;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\CityController;


Route::name('admin.')->group(function () {

    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'loginSubmit')->name('loginSubmit');
        Route::get('/logout', 'logout')->name('logout')->middleware('admin');
    });
    Route::middleware(['admin'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard');
        });

        Route::controller(CountryController::class)->prefix('countries')->name('countries.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{country}/edit', 'edit')->name('edit');
            Route::put('/{country}', 'update')->name('update');
            Route::delete('/{country}', 'destroy')->name('destroy');
        });

        Route::controller(StateController::class)->prefix('states')->name('states.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{state}/edit', 'edit')->name('edit');
            Route::put('/{state}', 'update')->name('update');
            Route::delete('/{state}', 'destroy')->name('destroy');
        });
        Route::controller(CityController::class)->prefix('cities')->name('cities.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{city}/edit', 'edit')->name('edit');
            Route::put('/{city}', 'update')->name('update');
            Route::delete('/{city}', 'destroy')->name('destroy');

            Route::get('/states/{countryId}', 'getStates')->name('states');

        });
    });

});