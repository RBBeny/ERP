<?php

use Illuminate\Support\Facades\Route;

use App\http\Controllers\VentasGerenteController;



Route::group(['middleware' => 'isVentasG'], function () {
    Route::get('/homeGVentas', [VentasGerenteController::class, 'home']);
    Route::get('/TablaUsuariosGV', [VentasGerenteController::class, 'usuarios']);
    Route::get('/TablaClienteGV', [VentasGerenteController::class, 'clientes']);
    Route::get('/Ventas', [VentasGerenteController::class, 'ReporteVendedores']);
    Route::get('/VerClienteGV/{id}', [VentasGerenteController::class, 'cliente']);
    Route::get('MostrarCuentas', [VentasGerenteController::class, 'cuentas']);
});
