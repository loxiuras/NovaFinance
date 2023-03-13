<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PasswordReset extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'email',
        'token',
    ];

    protected $hidden = [];

    protected $casts = [];

    #### Relations ####
    public function users(): belongsTo
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    #### Attributes ####

    #### Functions ####
}
