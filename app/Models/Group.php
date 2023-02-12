<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $hidden = [];

    protected $casts = [];

    #### Relations ####
    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    #### Attributes ####

    #### Functions ####
}
