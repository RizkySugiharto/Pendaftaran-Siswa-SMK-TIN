<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Web
Route::get('/', function () {
    return view('index', ["title" => "Selamat Datang Di SMK TIN"]);
})->name('index');

Route::name('candidates.')->controller(CandidateController::class)->group(function () {
    Route::get('/admin/candidates', 'index')->name('index');
    Route::get('/admin/candidates/{candidate}', 'show')->name('show');
    Route::put('/admin/candidates/{candidate}', 'update')->name('update');
    Route::put('/admin/candidates/grades/{candidate}', [GradeController::class, "updateOrStoreWeb"])->name('grades-update');
    Route::delete('/admin/candidates/{candidate}', 'destroy')->name('destroy');

    Route::get('/leaderboard', 'leaderboard')->name('leaderboard');
    Route::get('/register', 'create')->name('create');
    Route::post('/register', 'store')->name('store');
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
    Route::get('/logout', 'logout')->name('logout');
});

// API
Route::prefix('api')->group(function () {
    Route::post('/register', [CandidateController::class, 'registerAPI']);
    Route::get('/candidates/{candidate}', [CandidateController::class, 'showAPI']);

    Route::prefix('grades')->middleware('auth')->controller(GradeController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/{candidate}', 'show');
        Route::put('/{candidate}', 'updateOrStore');
        Route::delete('/{candidate}', 'destroy');
    });

    Route::prefix('admin')->controller(AdminController::class)->group(function () {
        Route::post('/login', 'loginAPI');
        Route::post('/logout', 'logoutAPI');
    });
});
