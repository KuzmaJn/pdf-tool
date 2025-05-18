<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfToolsController;
use App\Http\Controllers\PdfApiController;
use App\Http\Controllers\UserManualController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('pdf/merge', [PdfApiController::class, 'merge'])->name('pdf.merge');

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

    Route::get('/pdf-tools', [PdfToolsController::class, 'index'])->name('pdf.tools');
});

use App\Http\Controllers\HistoryController;

Route::middleware(['auth', 'admin'])->prefix('history')->group(function () {
    Route::get('/', [HistoryController::class, 'index'])->name('history.index');
    Route::post('/export', [HistoryController::class, 'export'])->name('history.export');
    Route::delete('/destroy-all', [HistoryController::class, 'destroyAll'])->name('history.destroyAll');
});


require __DIR__.'/auth.php';
