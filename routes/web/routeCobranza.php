<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\CobranzaController;


Route::group(['middleware' => 'isCobranza'], function(){
    Route:: get('/homeCobranza', [CobranzaController::class, 'home']);
    Route:: get('/ClientesCobranza',[CobranzaController::class, 'clientes']);
    Route:: get('/PagosCobranza',[CobranzaController::class, 'PagosCobranza']);
    Route:: get('/Recibos',[CobranzaController::class, 'Recibos']);
    Route:: get('/ClienteCobranza',[CobranzaController::class, 'ClienteCobranza']);
    Route:: get('/TablasClientesC',[CobranzaController::class, 'TablasClientesC']);
    Route::post('insertarPago',[CobranzaController::class,'insertarPago'])->name('insertarPago.insertarPago');
    Route:: get('/VerCliente/{id}', [CobranzaController::class, 'cliente']);
    
    Route:: get('/homeGCobranza', [CobranzaGerenteController::class, 'home']);
    Route:: get('/TablaUsuariosGC', [CobranzaGerenteController::class, 'usuarios']);
    Route:: get('/TablaClientesGC', [CobranzaGerenteController::class, 'clientes']);
    Route:: get('/GenerarReporte', [CobranzaGerenteController::class, 'Reporte']);
    Route:: get('/VerClienteGC/{id}', [CobranzaGerenteController::class, 'cliente']);
});

