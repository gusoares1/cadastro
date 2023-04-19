<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/pessoas', [App\Http\Controllers\ControladorPessoa::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/pessoas/novo', [App\Http\Controllers\ControladorPessoa::class, 'create']);

Route::post('/pessoas', [App\Http\Controllers\ControladorPessoa::class, 'store']);

Route::get('/pessoas/apagar/{id}', [App\Http\Controllers\ControladorPessoa::class, 'destroy']);

Route::get('/pessoas/editar/{id}', [App\Http\Controllers\ControladorPessoa::class, 'edit']);

Route::post('/pessoas/{id}', [App\Http\Controllers\ControladorPessoa::class, 'store']);


Route::get('/localizacao', [App\Http\Controllers\ControladorLocalizacao::class, 'indexView']);
