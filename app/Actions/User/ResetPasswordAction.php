<?php

namespace App\Actions\User;

use App\Http\Requests\User\PasswordResetStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

class ResetPasswordAction
{
    use AsAction;

    public function handle(PasswordResetStoreRequest $request, string $email): void
    {
        /** @var User $user */
        $user = User::where('email', $email)->first();

        $user->update([
            'password' => Hash::make($request->get('password')),
            'last_password_renewal_at' => now(),
        ]);

        $user->passwordReset()->delete();
    }
}
