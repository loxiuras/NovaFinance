<?php

use App\Http\Controllers\User\ForgotPasswordController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\PasswordResetController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware(['guest'])->group(function (): void {
    Route::apiResource('login', LoginController::class)->only(['index', 'store']);
    Route::apiResource('forgot-password', ForgotPasswordController::class)->only(['index', 'store']);
    Route::get('/password-reset/{email}/{token}', [PasswordResetController::class, 'index'])->name('password-reset.index');
    Route::post('/password-reset/{email}/{token}', [PasswordResetController::class, 'store'])->name('password-reset.store');
});

route::middleware(['auth'])->group(function (): void {
});
