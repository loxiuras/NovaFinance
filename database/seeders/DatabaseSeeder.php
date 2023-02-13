<?php

namespace Database\Seeders;

use Database\Seeders\Payment\DatabaseSeeder as PaymentDatabaseSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            GroupSeeder::class,
            UserSeeder::class,
            PaymentDatabaseSeeder::class,
        ]);
    }
}
