<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\RHController;
use App\http\Controllers\RegisterController;


Route::group(['middleware' => 'isRH'], function () {
    //Route::get('/homeAdmin', [FinanzasController::class, 'homeAdmin']); ejemplo de ruta
    Route::get('/registroUsuario', [RegisterController::class, 'inicio']);
    //Route::get('/register', [RegisterController::class, 'show']);

<<<<<<< HEAD
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
Route::post('/cobrador/{cveCobrador}', 'RHControllerController@edit')->name('cobrador.edit');
//
Route::put('/update/{cveVendedor}', [RHController::class, 'UpdateV']);
Route :: get('/VendedoresRH',[RHController::class, 'VendedoresRH']);
Route :: post('/CobradoresRH',[RHController::class, 'CobradoresRH']);



=======
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/homeRh', [RHController::class, 'homeRh']);
    Route::get('/UsuariosRH', [RHController::class, 'UsuariosRH']);
    Route::get('/VerPagosCobranza', [CobranzaController::class, 'VerPagosCobranza']);
    Route::get('/VerRecibos', [CobranzaController::class, 'VerRecibos']);
    Route::get('/VerClienteCobranza', [CobranzaController::class, 'VerClienteCobranza']);
    Route::get('/TablaClientesC', [CobranzaController::class, 'TablaClientesC']);
});
>>>>>>> 3ce1a516e74118afac5699c95d81971ad66f93ca
