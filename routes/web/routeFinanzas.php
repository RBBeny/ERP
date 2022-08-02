<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\FinanzasController;



Route::group(['middleware' => 'isFinanzas'], function () {
    Route::get('/homeFinanzas', [FinanzasController::class, 'homeFinanzas']);
    Route::get('/FinanzasIngresos', [FinanzasController::class, 'FinanzasIngresos']);
    Route::get('/ReporteIF/{fechainicio}/{fechafin}', [FinanzasController::class, 'GenerarReporte']);
   
});