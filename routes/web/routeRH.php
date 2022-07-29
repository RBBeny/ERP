<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\RHController;
use App\http\Controllers\RegisterController;


Route::group(['middleware' => 'isRH'], function () {
    //Route::get('/homeAdmin', [FinanzasController::class, 'homeAdmin']); ejemplo de ruta
    Route::get('/registroUsuario', [RegisterController::class, 'inicio']);
    //Route::get('/register', [RegisterController::class, 'show']);

    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/homeRh', [RHController::class, 'homeRh']);
    Route::get('/UsuariosRH', [RHController::class, 'UsuariosRH']);
    Route::get('/VerPagosCobranza', [CobranzaController::class, 'VerPagosCobranza']);
    Route::get('/VerRecibos', [CobranzaController::class, 'VerRecibos']);
    Route::get('/VerClienteCobranza', [CobranzaController::class, 'VerClienteCobranza']);
    Route::get('/TablaClientesC', [CobranzaController::class, 'TablaClientesC']);
});
