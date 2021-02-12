<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoFavoritoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login',  [AuthController::class, 'login']);
Route::resource('users', UserController::class);
Route::get('produtos/favoritos/{user_id}', [ProdutoController::class,'produtoFavorito']);
Route::get('produtos', [ProdutoController::class,'protudos']);

Route::group(['middleware' => 'auth:api'], function ($router) {
    Route::resource('favoritos', ProdutoFavoritoController::class);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh',[AuthController::class, 'refresh']);
    Route::post('me',     [AuthController::class, 'me']);
});

Route::get('enviar/email', [ EmailController::class,'enviarEmail']);
