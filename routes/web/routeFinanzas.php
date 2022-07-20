<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\FinanzasController;



Route::group(['middleware' => 'isFinanzas'], function () {
    //Route::get('/homeAdmin', [FinanzasController::class, 'homeAdmin']); ejemplo de ruta
   
});