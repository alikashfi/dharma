<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Category>
 */
final class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name'             => fake('fa_IR')->name,
            'title'            => fake()->title,
            'slug'             => \Str::limit(fake()->slug, 30, ''),
            'description'      => fake('fa_IR')->realText(rand(100, 300)),
            'meta_description' => fake('fa_IR')->realText(rand(100, 300)),
        ];
    }
}
