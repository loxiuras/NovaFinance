<?php

namespace App\Http\Controllers\User;

use App\Actions\User\LoginAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginStoreRequest;
use App\Models\UserBlocks;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class LoginController extends Controller
{
    public function index(): Factory|View|Application
    {
        $loginIsBlocked = (new UserBlocks())->hasBlockedLogin();

        return view('user.login.index.index', compact('loginIsBlocked'));
    }

    public function store(LoginStoreRequest $request)
    {
        if ((new UserBlocks())->hasBlockedLogin()) {
            return redirect()->route('login.index');
        }

        $login = (new LoginAction())->make()->handle($request);

        if (!$login) {
            return back()->withErrors(['credentials' => __('auth.failed')]);
        }

        return redirect()->route('dashboard.index');
    }
}
