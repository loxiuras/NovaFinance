<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    const amountOfGroups = 2;

    public function run(): void
    {
        for ($i = 1; $i <= self::amountOfGroups; $i++) {
            Group::updateOrCreate([
                'name' => 'Group ' . $i,
            ], []);
        }
    }
}
