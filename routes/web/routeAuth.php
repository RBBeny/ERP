<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthController;
use App\http\Controllers\LoginController;


Route::get('/', [LoginController::class, 'home']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);