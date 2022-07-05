<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\VentasController;

Route:: get('/HomeVentas', [VentasController::class, 'home']);
Route:: get('/ClientesVentas', [VentasController::class, 'clientes']);
Route:: get('/AgregarClientesVentas', [VentasController::class, 'agregarClientes']);
Route::post('insertarEstado',[VentasController::class,'insertarEstado'])->name('insertarEstado.insertarEstado');
Route::post('insertarMunicipio',[VentasController::class,'insertarMunicipio'])->name('insertarMunicipio.insertarMunicipio');
Route::post('insertarColonia',[VentasController::class,'insertarColonia'])->name('insertarColonia.insertarColonia');
Route::post('mostrarEstadosAjax',[VentasController::class,'mostrarEstadosAjax'])->name('mostrarEstadosAjax.mostrarEstadosAjax');
Route:: get('/VerClienteVentas/{id}', [VentasController::class, 'verCliente']);