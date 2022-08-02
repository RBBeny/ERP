<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\CobranzaController;
use App\http\Controllers\RegisterController;


Route::group(['middleware' => 'isCobranza'], function(){
    Route:: get('/homeCobranza', [CobranzaController::class, 'home']);
    Route:: get('/TablasClientesC', [CobranzaController::class, 'TablasClientesC']);
    Route::get('/VerClienteCobranza/{id}', [CobranzaController::class, 'cliente']);
    Route:: get('/PCobranza', [CobranzaController::class, 'PCobranza']);
<<<<<<< HEAD
    Route::delete('/destroyP/{cvePago}', [CobranzaController::class,'destroyP']);
=======
    Route:: get('/ClientesCobranza',[CobranzaController::class, 'clientes']);
    Route:: get('/PagosCobranza',[CobranzaController::class, 'PagosCobranza']);
    Route:: get('/Recibos',[CobranzaController::class, 'Recibos']);
    Route:: get('/ClienteCobranza',[CobranzaController::class, 'ClienteCobranza']);
    Route:: get('/TablasClientesC',[CobranzaController::class, 'TablasClientesC']);
    Route:: get('/VerCliente/{id}', [CobranzaController::class, 'cliente']);
    Route::delete('/destroyP/{CvePago}', [CobranzaController::class,'destroyP']);
>>>>>>> 9407e1bdf1769b37704fff770ccdd6a16de672bb
    Route::get('delete/{cvePago}',[CobranzaController::class,'eliminarPago'])->name('eliminarPago');
    Route::post('/Ppago', [CobranzaController::class, 'registerC']);
    Route::post('/PagosC', [CobranzaController::class, 'registerPC']);
});

