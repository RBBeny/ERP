<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\CobranzaGerenteController;

Route:: get('/homeGCobranza', [CobranzaGerenteController::class, 'home']);
Route:: get('/TablaUsuariosGC', [CobranzaGerenteController::class, 'usuarios']);
Route:: get('/TablaClientesGC', [CobranzaGerenteController::class, 'clientes']);
