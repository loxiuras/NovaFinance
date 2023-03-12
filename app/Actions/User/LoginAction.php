<?php

namespace App\Actions\User;

use App\Http\Requests\User\LoginStoreRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class LoginAction
{
    use AsAction;

    public function handle(LoginStoreRequest $request): bool
    {
        $email = $request->get('username');
        $password = $request->get('password');

        if (!auth()->attempt(['email' => $email, 'password' => $password], $request->get('rememberMe', false))) {
            (new LoginAttemptAction())->make()->handle();

            return false;
        }

        return true;
    }
}
