<?php

namespace App\Models\Payment;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'transaction_date',
        'transaction_type',
        'transaction_currency',
        'transaction_amount',
    ];

    protected $hidden = [];

    protected $casts = [
        'transaction_date' => 'date',
    ];

    #### Relations ####
    public function group(): belongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }

    #### Attributes ####

    #### Functions ####
}
