<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer(['pages.*', 'user.*'], function ($view) {
            $categories = Category::with('media')->orderBy('order')->get();
            $view->with([
                'headerCategories' => $categories->where('in_menu', true),
                'pageCategories' => $categories->where('in_page', true),
            ]);
        });
    }
}
