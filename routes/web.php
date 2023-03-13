<?php

use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\PasswordResetController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware(['guest'])->group(function (): void {
    Route::apiResource('login', LoginController::class)->only(['index', 'store']);
    Route::apiResource('password-reset', PasswordResetController::class)->only(['index', 'store']);
});

route::middleware(['auth'])->group(function (): void {
});
