<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\VentasController;

Route:: get('/HomeVentas', [VentasController::class, 'home']);
Route:: get('/ClientesVentas', [VentasController::class, 'clientes']);
Route:: get('/AgregarClientesVentas', [VentasController::class, 'agregarClientes']);
Route:: get('/VerClienteVentas', [VentasController::class, 'verCliente']);
Route::post('insertarEstado',[VentasController::class,'insertarEstado'])->name('insertarEstado.insertarEstado');
Route::post('mostrarEstadosAjax',[VentasController::class,'mostrarEstadosAjax'])->name('mostrarEstadosAjax.mostrarEstadosAjax');