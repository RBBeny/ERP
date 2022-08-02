<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\CobranzaController;
use App\http\Controllers\RegisterController;


Route:: get('/homeCobranza', [CobranzaController::class, 'home']);
Route:: get('/PCobranza', [CobranzaController::class, 'PCobranza']);
Route:: get('/ClientesCobranza',[CobranzaController::class, 'clientes']);
Route:: get('/PagosCobranza',[CobranzaController::class, 'PagosCobranza']);
Route:: get('/Recibos',[CobranzaController::class, 'Recibos']);
Route:: get('/ClienteCobranza',[CobranzaController::class, 'ClienteCobranza']);
Route:: get('/TablasClientesC',[CobranzaController::class, 'TablasClientesC']);
Route:: get('/VerCliente/{id}', [CobranzaController::class, 'cliente']);
Route::get('delete/{cvePago}',[CobranzaController::class,'eliminarPago'])->name('eliminarPago');
Route::post('/Ppago', [CobranzaController::class, 'registerC']);
Route::post('/PagosC', [CobranzaController::class, 'registerPC']);
Route::delete('/destroy/{id}', [CobranzaController::class,'destroy']);



Route::group(['middleware' => 'isCobranza'], function(){
    Route:: get('/homeCobranza', [CobranzaController::class, 'home']);
    Route:: get('/ClientesCobranza',[CobranzaController::class, 'clientes']);
    Route:: get('/PagosCobranza',[CobranzaController::class, 'PagosCobranza']);
    Route:: get('/Recibos',[CobranzaController::class, 'Recibos']);
    Route:: get('/ClienteCobranza',[CobranzaController::class, 'ClienteCobranza']);
    Route:: get('/TablasClientesC',[CobranzaController::class, 'TablasClientesC']);
    Route:: get('/VerCliente/{id}', [CobranzaController::class, 'cliente']);


    Route::post('/Ppago', [CobranzaController::class, 'register']);
    Route::post('/registrarPagos', [CobranzaController::class, 'registerP']);
    Route:: get('/PCobranza', [CobranzaController::class, 'PCobranza'])->name('PCobranza');
    Route::get('/verUsuarios', [AdministradorController::class, 'verUsuarios'])->name('verUsuarios');;



    Route::get('delete/{cvePago}',[CobranzaController::class,'eliminarPago'])->name('eliminarPago');
    Route::delete('/destroyP/{id}', [CobranzaController::class,'destroyP']);
    

    Route:: get('/homeGCobranza', [CobranzaGerenteController::class, 'home']);
    Route:: get('/TablaUsuariosGC', [CobranzaGerenteController::class, 'usuarios']);
    Route:: get('/TablaClientesGC', [CobranzaGerenteController::class, 'clientes']);
    Route:: get('/GenerarReporte', [CobranzaGerenteController::class, 'Reporte']);
    Route ::DELETE('delete/{id}',[CobranzaGerenteController::class, 'EliminarP']);
    Route:: get('/VerClienteGC/{id}', [CobranzaGerenteController::class, 'cliente']);

    Route::resource('pago', 'CobranzaController');

    //Route:: get('/homeGCobranza', [CobranzaGerenteController::class, 'home']);
    //Route:: get('/TablaUsuariosGC', [CobranzaGerenteController::class, 'usuarios']);
    //Route:: get('/TablaClientesGC', [CobranzaGerenteController::class, 'clientes']);
    //Route:: get('/GenerarReporte', [CobranzaGerenteController::class, 'Reporte']);
    //Route:: get('/VerClienteGC/{id}', [CobranzaGerenteController::class, 'cliente']);
});

