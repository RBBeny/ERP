<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;

Route:: get('/HomeAdmin', [AdministradorController::class, 'homeAdmin']);
Route:: get('/verUsuarioAdmin', [AdministradorController::class, 'verUsuarioAdmin']);
Route:: get('/agregarUsuariosAdmin', [AdministradorController::class, 'agregarUsuarios']);
Route:: get('/verUsuarios', [AdministradorController::class, 'verUsuarios']);



Route::post('insertarEstado',[AdministradorController::class,'insertarEstado'])->name('insertarEstado.insertarEstado');
Route::post('mostrarEstadosAjax',[AdministradorController::class,'mostrarEstadosAjax'])->name('mostrarEstadosAjax.mostrarEstadosAjax');