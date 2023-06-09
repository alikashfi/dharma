<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedCategories();

        Product::factory(30)->create(['category_id' => 1]);
        $this->assignFiles();

        $this->seedStatuses();

        Shipping::insert([['name' => 'ارسال پستی به تمامی نقاط کشور', 'price' => 20000], ['name' => 'پست پیشتاز', 'price' => 50000]]);

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
        \File::deleteDirectory(public_path('images/product'));

        $images = ['images/one.jpg', 'images/two.jpg', 'images/three.jpg', 'images/four.jpg', 'images/five.jpg'];
        foreach (Product::get() as $product) {
            shuffle($images);
            foreach ($images as $image)
                rand(0, 1)
                    ?: $product->addMedia(public_path($image))
                    ->usingFileName(Str::random() . '.jpg')
                    ->preservingOriginal()
                    ->toMediaCollection('product');
        }
    }

    private function seedCategories(): void
    {
        foreach (Category::factory(25)->create() as $category) {
            if ($category->id > 6)
                $category->update(['in_page' => false]);

            if ($category->id <= 8)
                continue;

            $category->update(['parent_id' => rand(1, 8)]);
        }
    }

    private function seedStatuses()
    {
        $statuses = [
            [
                'name'  => 'در انتظار پرداخت',
                'badge' => 'secondary',
                'slug' => 'pending',
            ],
            [
                'name'  => 'پرداخت ناموفق',
                'badge' => 'danger',
                'slug' => 'failed',
            ],
            [
                'name'  => 'در حال انجام',
                'badge' => 'info',
                'slug' => 'processing',
            ],
            [
                'name'  => 'تحویل به پست',
                'badge' => 'info',
                'slug' => 'shipped',
            ],
            [
                'name'  => 'تکمیل شده',
                'badge' => 'success',
                'slug' => 'completed',
            ],
            [
                'name'  => 'لغو شده',
                'badge' => 'light',
                'slug' => 'cancelled',
            ]
        ];
        Status::insert($statuses);
    }
}
