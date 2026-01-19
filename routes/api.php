<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskApiController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::prefix('v1')
        ->as('api.v1.') 
        ->group(function () {
            Route::apiResource('tasks', TaskApiController::class);
        });

});
