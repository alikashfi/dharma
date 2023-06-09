<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('order_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->string('trans1', 255)->nullable();
            $table->string('trans2', 255)->nullable();
            $table->text('result')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->uuid()->default(DB::raw('(UUID())'))->unique();
            $table->ipAddress('ip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
