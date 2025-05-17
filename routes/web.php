<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfToolsController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/pdf-tools', [PdfToolsController::class, 'index'])->name('pdf.tools');
