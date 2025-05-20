<?php

use App\Http\Controllers\Api\ApiKeyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfToolsController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\UserManualController;
use App\Http\Controllers\HistoryController;


Route::get('/', function () {
    return view('welcome');
});


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

    Route::get('/pdf-tools', [PdfToolsController::class, 'index'])->name('pdf-tools');

    Route::prefix('pdf')->controller(PdfToolsController::class)->group(function () {
        Route::post('/merge', 'merge')->name('pdf.merge');
        Route::post('/split', 'split')->name('pdf.split');
        Route::post('/remove-page', 'removePage')->name('pdf.removePage');
        // Pridávaj ďalšie PDF operácie tu...
    });
});


Route::middleware(['auth', 'admin'])->prefix('history')->group(function () {
    Route::get('/', [HistoryController::class, 'index'])->name('history.index');
    Route::post('/export', [HistoryController::class, 'export'])->name('history.export');
    Route::delete('/destroy-all', [HistoryController::class, 'destroyAll'])->name('history.destroyAll');
});


Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});


Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    Route::get(   '/api-keys',        [ApiKeyController::class,'index']);
    Route::post(  '/api-keys',        [ApiKeyController::class,'store']);
    Route::delete('/api-keys/{id}',   [ApiKeyController::class,'destroy']);
});
