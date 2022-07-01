<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\RHController;

Route:: get('/homeRh', [RHController::class, 'homeRh']);
Route :: get('/UsuariosRH',[RHController::class, 'UsuariosRH']);
Route :: get('/VerPagosCobranza',[CobranzaController::class, 'VerPagosCobranza']);
Route :: get('/VerRecibos',[CobranzaController::class, 'VerRecibos']);
Route :: get('/VerClienteCobranza',[CobranzaController::class, 'VerClienteCobranza']);
Route :: get('/TablaClientesC',[CobranzaController::class, 'TablaClientesC']);