<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    const password = 'Test123!';

    public function run(): void
    {
        User::updateOrCreate([
                'email' => 'super-admin@example.com',
            ], [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email_verified_at' => '2023-01-01 00:00:00',
                'password' => self::password,
                'last_password_renewal_at' => '2023-01-02 00:00:00',
        ]);

        for ($i = 1; $i <= 4; $i++) {
            $number = $this->createUserNumber($i);

            $user = User::updateOrCreate([
                'email' => "user-$number@example.com",
            ], [
                'first_name' => 'User',
                'last_name' => $number,
                'email_verified_at' => '2023-01-01 00:00:00',
                'password' => self::password,
                'last_password_renewal_at' => '2023-01-02 00:00:00',
            ]);

            $user->groups()->attach([ceil($i / 2)]);
        }
    }

    private function createUserNumber(int $index): string
    {
        if (strlen($index) === 3) return $index;

        if (strlen($index) === 2) return '0' . $index;

        return '00' . $index;
    }
}
