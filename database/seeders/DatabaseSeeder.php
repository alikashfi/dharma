<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'example@gmail.com',
            'password' => bcrypt('1234'),
        ]);
    }
}
