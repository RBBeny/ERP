<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\RHController;

<<<<<<< HEAD
use App\http\Controllers\RegisterController;

Route:: get('/registroUsuario', [RegisterController::class, 'inicio']);
//Route::get('/register', [RegisterController::class, 'show']);

Route::post('/register', [RegisterController::class, 'register']);
=======
Route:: get('/homeRh', [RHController::class, 'homeRh']);
Route :: get('/UsuariosRH',[RHController::class, 'UsuariosRH']);
Route :: get('/VerPagosCobranza',[CobranzaController::class, 'VerPagosCobranza']);
Route :: get('/VerRecibos',[CobranzaController::class, 'VerRecibos']);
Route :: get('/VerClienteCobranza',[CobranzaController::class, 'VerClienteCobranza']);
Route :: get('/TablaClientesC',[CobranzaController::class, 'TablaClientesC']);
>>>>>>> 9c779be167f926508746493e19fbda4bf41ab42f
