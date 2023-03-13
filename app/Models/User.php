<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_password_renewal_at' => 'datetime',
    ];

    #### Relations ####
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }

    public function loginAttempts(): HasOne
    {
        return $this->HasOne(Group::class);
    }

    public function passwordReset(): HasOne
    {
        return $this->HasOne(PasswordReset::class, 'email', 'email');
    }

    #### Attributes ####
    public function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Hash::make($value),
        );
    }

    #### Functions ####
    public function hasBlockedLogin(): bool
    {
        $loginAttempt = $this->loginAttempts();

        return !empty($loginAttempt) && $loginAttempt->blocked;
    }
}
