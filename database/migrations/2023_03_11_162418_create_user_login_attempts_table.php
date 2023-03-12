<?php

use App\Enums\User\UserBlockEmum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_blocks', function (Blueprint $table) {
            $table->id();
            $table->ipAddress();
            $table->tinyInteger('attempts')->default(0);
            $table->boolean('blocked')->default(false);
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('type',[UserBlockEmum::LOGIN->value])->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_login_attempts');
    }
};
