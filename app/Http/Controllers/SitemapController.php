<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function __invoke()
    {
        $products = Product::without('media')->orderBy('updated_at', 'desc')->get();
        $categories = Category::without('media')->get();
        $pages = Page::get();

        return response()->view('sitemap', compact('products', 'categories', 'pages'))->header('Content-Type', 'text/xml');
    }
}
