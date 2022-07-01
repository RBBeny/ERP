<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\CobranzaController;

Route:: get('/homeCobranza', [CobranzaController::class, 'home']);
Route:: get('/ClientesCobranza',[CobranzaController::class, 'clientes']);
Route:: get('/PagosCobranza',[CobranzaController::class, 'PagosCobranza']);
Route:: get('/Recibos',[CobranzaController::class, 'Recibos']);
Route:: get('/VerClienteCobranza',[CobranzaController::class, 'VerClienteCobranza']);
Route:: get('/TablaClientesC',[CobranzaController::class, 'TablaClientesC']);
Route::post('insertarPago',[CobranzaController::class,'insertarPago'])->name('insertarPago.insertarPago');
