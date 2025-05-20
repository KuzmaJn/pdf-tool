<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfToolsController;
use App\Http\Controllers\PdfApiController;

Route::get('/', function () {
    return view('auth/register');
});

Route::prefix('pdf')->controller(PdfToolsController::class)->group(function () {
    Route::post('/merge', 'merge')->name('pdf.merge');
    Route::post('/split', 'split')->name('pdf.split');
    Route::post('/remove-page', 'removePage')->name('pdf.removePage');
    // Pridávaj ďalšie PDF operácie tu...
});

Route::get('/pdf-tools', function () {
    return view('pdf-tools');
})->middleware(['auth', 'verified'])->name('pdf-tools');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
