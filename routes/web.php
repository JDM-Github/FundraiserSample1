<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

// RESOURCES
Route::resource('news', NewsController::class);
Route::get('/news/{news:slug}', [NewsController::class, 'show'])->name('news.show');


Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});


// FOR USERS
Route::middleware('auth')->group(function () {

    // GLOBAL ROUTE FOR ALL ROLE
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');


    // FUNDRAISER ROLE
    Route::middleware('role:fundraiser')->group(function () {
        Route::get('/user', function () { return "TEST FUNDRAISER"; })->name('user');
    });

    // SUPER ADMIN | ADMIN ROLE
    Route::middleware('role:super_admin,admin')->group(function () {
        Route::get('/admin', function () {
            return "TEST ADMIN";
        })->name('admin');
    });

    // SUPER ADMIN ONLY
    Route::middleware('role:super_admin')->group(function () {
        Route::get('/super_admin', function () {
            return "TEST SUPER ADMIN";
        })->name('super_admin');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
