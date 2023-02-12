<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    const password = 'Test123!';

    public function run(): void
    {
        $adminUsers = [
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'super-admin@example.com',
                'email_verified_at' => '2023-01-01 00:00:00',
                'password' => Hash::make(self::password),
                'last_password_renewal_at' => '2023-01-02 00:00:00',
            ],
        ];

        $leadUsers = [
            [
                'first_name' => 'User',
                'last_name' => '001',
                'email' => 'user-001@example.com',
                'email_verified_at' => '2023-01-01 00:00:00',
                'password' => Hash::make(self::password),
                'last_password_renewal_at' => '2023-01-02 00:00:00',
            ],
            [
                'first_name' => 'User',
                'last_name' => '002',
                'email' => 'user-002@example.com',
                'email_verified_at' => '2023-01-02 00:00:00',
                'password' => Hash::make(self::password),
                'last_password_renewal_at' => '2023-01-03 00:00:00',
            ],
        ];

        $users = [];
        $users = array_merge($users, $adminUsers);
        $users = array_merge($users, $leadUsers);

        DB::table('users')->insert($users);
    }
}
