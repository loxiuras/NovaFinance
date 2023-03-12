<?php

namespace Database\Seeders\Payment;

use App\Models\Group;
use App\Models\Payment\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    const categories = [
        'Shopping' => [
            'Walmart',
            'Amazon',
            'Target',
            'Food' => [
                'Mac Donald',
                'KFC',
                'Dunkin donuts',
            ],
            'Drinks' => [
                'Starbucks',
                'McCafe',
            ],
            'Groceries' => [
                'Whole greens',
                'Kroger',
                'Costco',
            ],
        ],
        'Finance' => [
            'Crypto wallet',
            'Banking',
            'Credit-card',
        ],
        'Vehicles' => [
            'Insurance',
            'Gas',
            'Maintenance' => [
                'Big service',
                'Small service',
            ],
            'Tuning and modifications',
        ],
        'House',
    ];

    public function run(): void
    {
        $groups = Group::all();

        if ($groups->isNotEmpty()) {
            foreach ($groups as $group) {
                foreach (self::categories as $category => $items) {
                    $this->createCategory($group->id, $category, $items);
                }

                Category::updateSequence($group->id);
            }
        }
    }

    private function createCategory(int $groupId, string|int $category, array|string $items = null, int $categoryId = null): void
    {
        $category = Category::updateOrCreate([
            'group_id' => $groupId,
            'name' => is_int($category) ? $items : $category,
            'category_id' => $categoryId ?: null,
        ]);

        if (is_string($category)) {
            return;
        }

        if (is_array($items)) {
            foreach ($items as $item => $keys) {
                $this->createCategory($groupId, $item, $keys, $category->id);
            }
        }
    }
}
