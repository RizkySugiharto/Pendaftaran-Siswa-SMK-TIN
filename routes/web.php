<?php

use App\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form-psb', function () {
    return view('form_psb');
});

Route::post('/form-psb', [ CandidateController::class, 'create']);