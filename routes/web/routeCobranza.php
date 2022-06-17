<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\CobranzaController;

Route:: get('/homeCobranza', [CobranzaController::class, 'home']);
Route :: get('/ClientesCobranza',[CobranzaController::class, 'clientes']);
Route :: get('/VerPagosCobranza',[CobranzaController::class, 'VerPagosCobranza']);
Route :: get('/VerRecibos',[CobranzaController::class, 'VerRecibos']);
Route :: get('/VerClienteCobranza',[CobranzaController::class, 'VerClienteCobranza']);
Route :: get('/TablaClientesC',[CobranzaController::class, 'TablaClientesC']);