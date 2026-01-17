<?php
use App\Http\Controllers\Api\TaskApiController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tasks', TaskApiController::class);
});
