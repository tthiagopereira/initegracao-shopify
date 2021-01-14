<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::resource('users', UserController::class);
Route::post('login',  [AuthController::class, 'login']);
Route::resource('users', UserController::class);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function ($router) {

//    Route::post('login',  [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh',[AuthController::class, 'refresh']);
    Route::post('me',     [AuthController::class, 'me']);
    Route::resource('tarefas', TarefaController::class);
    Route::get('tarefa/user/{id}',[TarefaController::class, 'listUSerTarefa']);
});
