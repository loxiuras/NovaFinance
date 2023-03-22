<?php

namespace App\Http\Controllers\User;

use App\Actions\User\LogoutAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    public function store(): RedirectResponse
    {
        (new LogoutAction())->make()->handle();

        return redirect()->route('login.index');
    }
}
