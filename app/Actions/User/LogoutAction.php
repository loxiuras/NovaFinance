<?php

namespace App\Actions\User;

use Lorisleiva\Actions\Concerns\AsAction;

class LogoutAction
{
    use AsAction;

    public function handle(): void
    {
        auth()->logout();
    }
}
