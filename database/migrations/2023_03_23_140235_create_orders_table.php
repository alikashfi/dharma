<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('status_id')->default(1)->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('shipping_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->boolean('is_paid')->default(false);
            $table->unsignedMediumInteger('price');
            $table->unsignedMediumInteger('shipping_price')->nullable();
            $table->string('comment', 255)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
