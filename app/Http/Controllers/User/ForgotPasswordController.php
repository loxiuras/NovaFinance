<?php

namespace App\Http\Controllers\User;

use App\Actions\User\PasswordResetAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ForgotPasswordStoreRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ForgotPasswordController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('user.forgot-password.index.index');
    }

    public function store(ForgotPasswordStoreRequest $request): RedirectResponse
    {
        (new PasswordResetAction())->make()->handle($request);

        return back()->with(['message' => __('auth.password-reset')]);
    }
}
