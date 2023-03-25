<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedCategories();

        Product::factory(10)->create(['category_id' => 1]);
        $this->assignFiles();

        Status::factory(4)->create();

        User::factory()->create([
            'fname'    => 'ادمین',
            'lname'    => 'ادمین زاده',
            'email'    => 'example@gmail.com',
            'password' => bcrypt('1234'),
            'is_admin' => true,
        ]);
    }

    private function assignFiles(): void
    {
        $images = ['images/one.jpg', 'images/two.jpg', 'images/three.jpg'];
        foreach (Product::get() as $product)
            foreach ($images as $image)
                rand(0, 1) ?: $product->addMedia(public_path($image))
                    ->usingFileName(Str::random() . '.jpg')
                    ->preservingOriginal()
                    ->toMediaCollection('product');
    }

    private function seedCategories(): void
    {
        foreach (Category::factory(25)->create() as $category) {
            if ($category->id > 6)
                $category->update(['in_page' => false]);

            if ($category->id <= 8) continue;

            $category->update(['parent_id' => rand(1,8)]);
        }
    }
}
