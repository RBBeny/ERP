<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;


Route::group(['middleware' => 'isAdministrador'], function () {
    Route::get('/homeAdmin', [AdministradorController::class, 'homeAdmin']);
    Route::get('/verUsuarioAdmin', [AdministradorController::class, 'verUsuarioAdmin']);
    Route::get('/agregarUsuariosAdmin', [AdministradorController::class, 'edit']);
    Route::get('/verUsuarios', [AdministradorController::class, 'verUsuarios'])->name('verUsuarios');;
    Route::put('/update/{id}', [AdministradorController::class,'update'])->name('update');
    Route::delete('/destroy/{id}', [AdministradorController::class,'destroy']);
    Route::post('/registrarUsuariosAdmin', [AdministradorController::class, 'registerAdmin']);
});
