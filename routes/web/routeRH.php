<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\RHController;

use App\http\Controllers\RegisterController;

Route:: get('/registroUsuario', [RegisterController::class, 'inicio']);
//Route::get('/register', [RegisterController::class, 'show']);

Route::post('/register', [RegisterController::class, 'register']);