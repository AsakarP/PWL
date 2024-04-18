<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PollingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[LoginController::class,'index']);

Route::resource('/poll',PollingController::class);