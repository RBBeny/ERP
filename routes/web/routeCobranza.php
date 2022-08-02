<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\CobranzaController;
use App\http\Controllers\RegisterController;


Route::group(['middleware' => 'isCobranza'], function(){
    Route:: get('/homeCobranza', [CobranzaController::class, 'home']);
    Route:: get('/TablasClientesC', [CobranzaController::class, 'TablasClientesC']);
    Route::get('/VerClienteCobranza/{id}', [CobranzaController::class, 'cliente']);
    Route:: get('/PCobranza', [CobranzaController::class, 'PCobranza']);
    Route::delete('/destroyP/{cvePago}', [CobranzaController::class,'destroyP']);
    Route::get('delete/{cvePago}',[CobranzaController::class,'eliminarPago'])->name('eliminarPago');
    Route::post('/Ppago', [CobranzaController::class, 'registerC']);
    Route::post('/PagosC', [CobranzaController::class, 'registerPC']);
});

