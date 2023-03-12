<?php

namespace App\Actions\User;

use App\Enums\User\UserBlockEmum;
use App\Models\UserBlocks;
use Lorisleiva\Actions\Concerns\AsAction;

class LoginAttemptAction
{
    use AsAction;

    public function handle(): void
    {
        $ipAddress = $_SERVER['REMOTE_ADDR'] ?? null;

        $loginAttempt = UserBlocks::where('ip_address', $ipAddress)->firstOr(function() use ($ipAddress) {
            return UserBlocks::create([
               'ip_address' => $ipAddress,
               'type' => UserBlockEmum::LOGIN->value,
            ]);
        });

        $newAttemptAmount = $loginAttempt->attempts + 1;
        $loginAttempt->update([
           'attempts' => $newAttemptAmount,
           'blocked' => $newAttemptAmount >= 3,
        ]);
    }
}
