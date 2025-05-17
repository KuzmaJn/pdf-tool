<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfApiController;

Route::get('/', function () {
    return view('index');
});

Route::post('pdf/merge', [PdfApiController::class, 'merge'])->name('pdf.merge');
Route::get('/download/{filename}', [\App\Http\Controllers\PdfApiController::class, 'download'])->name('pdf.download');

