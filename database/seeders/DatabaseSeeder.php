<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(5)->create();

        Product::factory(10)->create(['category_id' => Category::first()->id]);

        Status::factory(4)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'example@gmail.com',
            'password' => bcrypt('1234'),
        ]);
    }
}
