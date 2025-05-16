<?php
use App\Http\Controllers\UserController;

Route::prefix('users')->group(function () {
    Route::post('/', [UserController::class, 'store']);     // Vytvoriť používateľa
    Route::get('/', [UserController::class, 'index']);      // Zoznam používateľov
    Route::get('{id}', [UserController::class, 'show']);    // Detail používateľa
    Route::put('{id}', [UserController::class, 'update']);  // Update používateľa
    Route::delete('{id}', [UserController::class, 'destroy']); // Zmazať používateľa
});


use App\Http\Controllers\HistoryController;

Route::prefix('history')->group(function () {
    Route::get('/', [HistoryController::class, 'index']);
    Route::get('{id}', [HistoryController::class, 'show']);
    Route::post('/', [HistoryController::class, 'store']);
    Route::put('{id}', [HistoryController::class, 'update']);
    Route::delete('{id}', [HistoryController::class, 'destroy']);
});
