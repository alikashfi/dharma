<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function __invoke()
    {
        $products = Product::without('media')->get();
        $categories = Category::without('media')->get();

        return response()->view('sitemap', compact('products', 'categories'))->header('Content-Type', 'text/xml');
    }
}
