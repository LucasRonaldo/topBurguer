<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/produtos', [ProdutoController::class, 'index']);

Route::post('/produtos', [ProdutoController::class, 'store']);

Route::post('cadastro/cliente',[ClienteController::class, 'cadastrarCliente']);
Route::get('/cliente',[ClienteController::class, 'index']);
