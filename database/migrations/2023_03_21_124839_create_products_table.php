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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('title', 50)->nullable();
            $table->string('slug', 30)->unique();
            $table->text('description')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('code', 30)->nullable()->unique();
            $table->unsignedMediumInteger('price')->default(0);
            $table->boolean('is_available')->default(true);
            $table->unsignedSmallInteger('daily_views')->default(0);
            $table->unsignedMediumInteger('views')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
