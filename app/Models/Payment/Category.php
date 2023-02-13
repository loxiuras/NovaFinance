<?php

namespace App\Models\Payment;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $hidden = [];

    protected $casts = [];

    #### Relations ####
    public function group(): belongsTo
    {
        return $this->belongsTo(Group::class);
    }

    #### Attributes ####

    #### Functions ####
}
