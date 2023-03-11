<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginStoreRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class LoginController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('user.login.index.index');
    }

    public function store(LoginStoreRequest $request)
    {
        $email    = $request->get('username');
        $password = $request->get('password');

        if ( !auth()->attempt(['email' => $email, 'password' => $password], !empty($request->rememberMe)) ) {
            // TODO: Block IP-address when multiple invalid requests are send;

            return back()->withErrors(['credentials' => __('auth.failed')]);
        }

        dd('Valid?');

        // TODO: Validate account;
        // TODO: Login user;
        // TODO: Redirect user to dashboard;
    }
}
