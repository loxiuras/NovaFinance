<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
    public function groups(): belongsToMany
    {
        return $this->belongsToMany(Group::class);
    }

    #### Attributes ####
    public function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Hash::make($value),
        );
    }

    #### Functions ####
}
