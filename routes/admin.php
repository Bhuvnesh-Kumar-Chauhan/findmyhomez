<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\auth\Authcontroller;
use App\Http\Controllers\Admin\AdminController;
// use App\Http\Controllers\Admin\UserController;
// use App\Http\Controllers\Admin\PropertyController;
// use App\Http\Controllers\Admin\BlogController;

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
    });

    // Route::prefix('users')
    //     ->name('users.')
    //     ->controller(UserController::class)
    //     ->group(function () {
    //         Route::get('/', 'index')->name('index');
    //         Route::get('/create', 'create')->name('create');
    //         Route::post('/', 'store')->name('store');
    //         Route::get('/{user}/edit', 'edit')->name('edit');
    //         Route::put('/{user}', 'update')->name('update');
    //         Route::delete('/{user}', 'destroy')->name('destroy');
    //     });

    // Properties Management
    // Route::prefix('properties')
    //     ->name('properties.')
    //     ->controller(PropertyController::class)
    //     ->group(function () {
    //         Route::get('/', 'index')->name('index');
    //         Route::get('/create', 'create')->name('create');
    //         Route::post('/', 'store')->name('store');
    //         Route::get('/{property}/edit', 'edit')->name('edit');
    //         Route::put('/{property}', 'update')->name('update');
    //         Route::delete('/{property}', 'destroy')->name('destroy');
    //     });

    // Blog Management
    // Route::prefix('blog')
    //     ->name('blog.')
    //     ->controller(BlogController::class)
    //     ->group(function () {
    //         Route::get('/', 'index')->name('index');
    //         Route::get('/create', 'create')->name('create');
    //         Route::post('/', 'store')->name('store');
    //         Route::get('/{post}/edit', 'edit')->name('edit');
    //         Route::put('/{post}', 'update')->name('update');
    //         Route::delete('/{post}', 'destroy')->name('destroy');
    //     });

    // Settings (example)
    // Route::get('/settings', [AdminController::class, 'settings'])
    //     ->name('settings');
});