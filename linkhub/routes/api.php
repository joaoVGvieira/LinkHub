<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\LinkController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Rotas protegidas pelo Sanctum
Route::middleware('auth:sanctum')->group(function () {

    // Retorna o usuário logado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Rotas de API para os Links
    Route::apiResource('links', LinkController::class);
});