<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Product>
 */
final class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'category_id'      => Category::factory()->create()->id,
            'name'             => fake('fa_IR')->name,
            'title'            => fake('fa_IR')->name,
            'slug'             => \Str::limit(fake()->unique()->slug(), 30, ''),
            'description'      => fake('fa_IR')->realtext(rand(20, 100)),
            'meta_description' => fake('fa_IR')->realtext(rand(20, 100)),
            'code'             => fake()->unique()->word,
            'price'            => ceil(fake()->numberBetween(10000, 99000) / 1000) * 1000,
            'is_available'     => fake()->optional(70, false)->randomElement([true]),
            'daily_views'      => fake()->numberBetween(0, 1000),
            'views'            => fake()->numberBetween(1000, 10000),
        ];
    }
}
