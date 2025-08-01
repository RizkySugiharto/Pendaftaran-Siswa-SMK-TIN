<?php

use App\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/form-psb', [ CandidateController::class, 'create'])->name('form-psb');
Route::post('/form-psb', [ CandidateController::class, 'store']);