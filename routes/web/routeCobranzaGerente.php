<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\CobranzaGerenteController;
use App\http\Controllers\RegisterController;

Route:: get('/homeGCobranza', [CobranzaGerenteController::class, 'home']);
Route:: get('/TablaUsuariosGC', [CobranzaGerenteController::class, 'usuarios']);
Route:: get('/TablaClientesGC', [CobranzaGerenteController::class, 'clientes']);
Route::post('/register', [RegisterController::class, 'register']);
Route:: get('/GenerarReporte', [CobranzaGerenteController::class, 'Reporte']);
Route:: get('/VerClienteGC/{id}', [CobranzaGerenteController::class, 'cliente']);
