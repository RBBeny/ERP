<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\RHController;
use App\http\Controllers\RegisterController;



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



