<?php

namespace App\Models;

use App\Enums\User\UserBlockEmum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserBlocks extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'attempts',
        'blocked',
        'type',
        'user_id',
    ];

    protected $hidden = [];

    protected $casts = [
        'blocked' => 'boolean',
    ];

    #### Relations ####
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    #### Attributes ####

    #### Functions ####
    public function hasBlockedLogin(): bool
    {
        $loginAttempt = UserBlocks::where('ip_address', $_SERVER['REMOTE_ADDR'])
            ->where('type', UserBlockEmum::LOGIN->value)
            ->first();

        return !empty($loginAttempt) && $loginAttempt->blocked;
    }
}
