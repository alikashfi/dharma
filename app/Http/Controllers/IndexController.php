<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function home(): View
    {
        return view('pages.home');
    }

    public function shop(): View
    {
        $products = Product::paginate(10);

        return view('pages.shop', compact('products'));
    }

    public function product(Product $product): View
    {
        $product->load('category');
        // todo: increase view

        return view('pages.product', compact('product'));
    }

    public function category(Category $category)
    {
        $products = $category->products()->paginate(10);

        return view('pages.category', compact('products', 'category'));
    }
}
