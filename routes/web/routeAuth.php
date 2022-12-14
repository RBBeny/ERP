<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\LoginController;


Route::get('/', [LoginController::class,'home']);
Route::post('/Login', [LoginController::class,'login']);
Route::get('/logout', [LoginController::class,'logout']);