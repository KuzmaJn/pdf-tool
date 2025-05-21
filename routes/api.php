<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfToolsController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/pdf/merge', [PdfToolsController::class, 'merge']);
    Route::post('/pdf/split', [PdfToolsController::class, 'split']);
    Route::post('/pdf/unlock', [PdfToolsController::class, 'unlock']);
    Route::post('/pdf/lock', [PdfToolsController::class, 'lock']);
    Route::post('/pdf/rotate', [PdfToolsController::class, 'rotate']);
    Route::post('/pdf/removePage', [PdfToolsController::class, 'removePage']);
    Route::post('/pdf/extractPage', [PdfToolsController::class, 'extractPage']);
    Route::post('/pdf/numberPages', [PdfToolsController::class, 'numberPages']);
    Route::post('/pdf/create', [PdfToolsController::class, 'create']);
    Route::post('/pdf/addWatermark', [PdfToolsController::class, 'addWatermark']);
});
