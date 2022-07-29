<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\RHController;
use App\http\Controllers\RegisterController;



<<<<<<< HEAD
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/homeRh', [RHController::class, 'homeRh']);
    Route::get('/UsuariosRH', [RHController::class, 'UsuariosRH']);
    Route::get('/VerPagosCobranza', [CobranzaController::class, 'VerPagosCobranza']);
    Route::get('/VerRecibos', [CobranzaController::class, 'VerRecibos']);
    Route::get('/VerClienteCobranza', [CobranzaController::class, 'VerClienteCobranza']);
    Route::get('/TablaClientesC', [CobranzaController::class, 'TablaClientesC']);
});
=======
Route::get('/registroUsuario', [RegisterController::class, 'inicio']);
//Route::get('/register', [RegisterController::class, 'show']);

Route::post('/register', [RegisterController::class, 'register']);
Route:: get('/homeRh', [RHController::class, 'homeRh']);
Route:: get('/cobradoredit', [RHController::class, 'cobradoredit']);
Route :: get('/CobradoresRH',[RHController::class, 'CobradoresRH']);
Route::post('/CjCobrador', [RHController::class, 'register']);
Route::post('/FVendedores', [RHController::class, 'registerV']);
//Route::resource('/employee',[RHController::class, 'edit']);
Route::get('/cobrador/{cveCobrador}/edit','RHControllerController@update')->name('cobrador.update');
//
Route::put('/update/{cveVendedor}', [RHController::class, 'UpdateV']);
Route :: get('/VendedoresRH',[RHController::class, 'VendedoresRH']);
Route :: post('/CobradoresRH',[RHController::class, 'CobradoresRH']);



>>>>>>> 9e4a0aed4251c7669f1045e4803e9cba51c59cca
