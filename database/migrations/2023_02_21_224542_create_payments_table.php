<?php

use App\Enums\Payment\TransactionCurrencyEnum;
use App\Enums\Payment\TransactionTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('group_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('transaction_date');
            $table->string('transaction_type')->default(TransactionTypeEnum::In->value);
            $table->string('transaction_currency')->default(TransactionCurrencyEnum::Euro->value);
            $table->float('transaction_amount')->default(0.00);
            $table->timestamps();

            $table->index('transaction_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
