<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->references('id')->on('categories')->cascadeOnUpdate()->nullOnDelete();
            $table->string('name', 30);
            $table->string('title', 50)->nullable();
            $table->string('slug', 30)->unique();
            $table->string('color', 7)->default('#FFFFFF');
            // $table->string('image', 30);
            $table->text('description');
            $table->text('meta_description')->nullable();
            $table->unsignedTinyInteger('order')->nullable();
            $table->boolean('in_menu')->default(true);
            $table->boolean('in_page')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
