<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::name('candidates.')->controller(CandidateController::class)->group(function () {
    Route::get('/admin/candidates', 'index')->name('index');
    Route::get('/admin/candidates/{candidate}', 'show')->name('show');
    Route::put('/admin/candidates/{candidate}', 'update')->name('update');
    Route::delete('/admin/candidates/{candidate}', 'destroy')->name('destroy');

    Route::get('/register', 'create')->name('create');
    Route::post('/register', 'store')->name('store');
    Route::get('/registered', function(){ return view('registered'); } )->name("registered");
});

Route::name('users.')->controller(UserController::class)->group(function () {
    Route::get('/admin/users', 'index')->name('index');
    Route::post('/admin/users', 'store')->name('store');
    Route::get('/admin/users/{user}', 'show')->name('show');
    Route::put('/admin/users/{user}', 'update')->name('update');
    Route::delete('/admin/users/{user}', 'destroy')->name('destroy');
})->middleware('auth');

Route::name('admin.')->prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware('auth');
    Route::get('/login', 'login_page')->name('login-page');
    Route::post('/login', 'login')->name('login');
});

