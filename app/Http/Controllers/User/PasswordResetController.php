<?php

namespace App\Http\Controllers\User;

use App\Actions\User\ResetPasswordAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\PasswordResetStoreRequest;
use App\Models\PasswordReset;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PasswordResetController extends Controller
{
    public function index(string $email = null, string $token = null): Application|Factory|View|RedirectResponse
    {
        if (!PasswordReset::where('email', $email)->where('token', $token)->exists()) {
            return redirect()->route('login.index');
        }

        return view('user.password-reset.index.index', compact('email', 'token'));
    }

    public function store(PasswordResetStoreRequest $request, string $email, string $token): RedirectResponse
    {
        if (PasswordReset::where('email', $email)->where('token', $token)->exists()) {
            (new ResetPasswordAction())->make()->handle($request, $email);
        }

        return redirect()->route('login.index')->with(['message' => __('auth.password-reset-confirm')]);
    }
}
