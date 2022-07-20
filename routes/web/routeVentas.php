<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\VentasController;


Route::group(['middleware' => 'isVentas'], function () {

    Route::get('/homeVentas', [VentasController::class, 'home']);
    Route::get('/ClientesVentas', [VentasController::class, 'clientes']);
    Route::get('/AgregarClientesVentas', [VentasController::class, 'agregarClientes']);
    Route::post('insertarEstado', [VentasController::class, 'insertarEstado'])->name('insertarEstado.insertarEstado');
    Route::post('insertarMunicipio', [VentasController::class, 'insertarMunicipio'])->name('insertarMunicipio.insertarMunicipio');
    Route::post('insertarColonia', [VentasController::class, 'insertarColonia'])->name('insertarColonia.insertarColonia');
    Route::post('mostrarEstadosAjax', [VentasController::class, 'mostrarEstadosAjax'])->name('mostrarEstadosAjax.mostrarEstadosAjax');
    Route::post('insertarCliente', [VentasController::class, 'insertarCliente'])->name('insertarCliente.insertarCliente');
    Route::get('/VerClienteVentas/{id}', [VentasController::class, 'verCliente']);
    Route::get('/consultarMunicipio', [VentasController::class, 'getConsultarMunicipio']);
    Route::get('/consultarColonia', [VentasController::class, 'getConsultarColonia']);
    Route::get('/consultarMunicipioCobro', [VentasController::class, 'getConsultarMunicipio']);
    Route::get('/consultarColoniaCobro', [VentasController::class, 'getConsultarColonia']);
    Route::get('/consultarPaquete', [VentasController::class, 'getConsultarPaquete']);
});

