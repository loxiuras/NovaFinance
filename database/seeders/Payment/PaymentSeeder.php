<?php

namespace Database\Seeders\Payment;

use App\Enums\Payment\TransactionCurrencyEnum;
use App\Enums\Payment\TransactionTypeEnum;
use App\Models\Payment\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        Payment::updateOrCreate([
            'group_id' => 1,
            'user_id' => 2,
            'category_id' => 6, // Mac Donald
            'title' => 'Food from Mac Donald',
        ], [
            'description' => '2x MacChicken and 1x milkshake banana.',
            'transaction_date' => now()->subDays(2),
            'transaction_type' => TransactionTypeEnum::Out->value,
            'transaction_currency' => TransactionCurrencyEnum::Euro->value,
            'transaction_amount' => 10.89,
        ]);

        Payment::updateOrCreate([
            'group_id' => 1,
            'user_id' => 2,
            'category_id' => 7, // KFC
            'title' => 'Food from KFC',
        ], [
            'description' => '1x KFC chicken.',
            'transaction_date' => now()->subDays(4),
            'transaction_type' => TransactionTypeEnum::Out->value,
            'transaction_currency' => TransactionCurrencyEnum::Euro->value,
            'transaction_amount' => 6.90,
        ]);

        Payment::updateOrCreate([
            'group_id' => 1,
            'user_id' => 2,
            'category_id' => 10, // Starbucks
            'title' => 'Coffee from Starbucks',
        ], [
            'description' => '1x normal coffee',
            'transaction_date' => now()->subDays(6),
            'transaction_type' => TransactionTypeEnum::Out->value,
            'transaction_currency' => TransactionCurrencyEnum::Euro->value,
            'transaction_amount' => 3.25,
        ]);

        Payment::updateOrCreate([
            'group_id' => 1,
            'user_id' => 2,
            'category_id' => 19, // Credit-card
            'title' => 'Monthly income',
        ], [
            'description' => 'Salary',
            'transaction_date' => now()->subDays(10),
            'transaction_type' => TransactionTypeEnum::In->value,
            'transaction_currency' => TransactionCurrencyEnum::Euro->value,
            'transaction_amount' => 1250.00,
        ]);
    }
}
