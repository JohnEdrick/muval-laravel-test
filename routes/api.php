<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(
    function () {
        Route::middleware('api')->group(
            function () {
                // Route::apiResource('tasks', TaskController::class);
                Route::get('tasks', [TaskController::class, 'index']);
                Route::post('tasks', [TaskController::class, 'store']);
                Route::get('tasks/{task}', [TaskController::class, 'show']);
                Route::put('tasks/{task}', [TaskController::class, 'update']);
                Route::delete('tasks/{task}', [TaskController::class, 'destroy']);

                Route::get('users', function () {
                    return \App\Models\User::all();
                });
            }
        );
    }
);
