<?php

namespace App\Models\Payment;

use App\Models\Group;
use Database\Seeders\Payment\CategorySeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'sequence',
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
    public static function updateSequence(int $groupId): void
    {
        $categories = Category::whereNull('category_id')
            ->where('group_id', $groupId)
            ->orderBy('name')
            ->get();

        if ($categories->isNotEmpty()) {
            $sequence = 1;

            foreach ($categories as $category) {
                $category->update(['sequence' => $sequence++]);

                // Save children;
            }
        }
    }
}
