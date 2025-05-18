<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfToolsController;
use App\Http\Controllers\PdfApiController;
use App\Http\Controllers\UserManualController;

Route::get('/', function () {
    return view('dashboard');
});

Route::post('pdf/merge', [PdfApiController::class, 'merge'])->name('pdf.merge');



Route::get('/pdf-tools', [PdfToolsController::class, 'index'])->name('pdf.tools');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/použivateľská-príručka', [UserManualController::class, 'index'])->name('manual');
    Route::get('/používateľská-príručka/stiahnut', [UserManualController::class, 'downloadPdf'])
        ->name('manual.download');
});

require __DIR__.'/auth.php';
