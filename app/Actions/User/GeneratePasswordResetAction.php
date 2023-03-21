<?php

namespace App\Actions\User;

use App\Http\Requests\User\ForgotPasswordStoreRequest;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class GeneratePasswordResetAction
{
    use AsAction;

    public function handle(ForgotPasswordStoreRequest $request): bool
    {
        $email = $request->get('email');

        $user = User::where('email', $email)->first();
        if (!$user) {
            return false;
        }

        if ($user->passwordReset()->exists()) {
            $user->passwordReset()->delete();
        }

        $user->passwordReset()->create([
            'token' => str()->random(64),
            'created_at' => now(),
        ]);

        // TODO: Create send password reset email;

        return true;
    }
}
