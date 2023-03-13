<?php

use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware(['guest'])->group(function (): void {
    Route::apiResource('login', LoginController::class)->only(['index', 'store']);
    Route::apiResource('forgot-password', ForgotPasswordController::class)->only(['index', 'store']);
});

route::middleware(['auth'])->group(function (): void {
});
