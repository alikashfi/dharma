<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function shop(): View
    {
        $products = Product::paginate();
        $pageCategories = Category::where('in_page', true)->get();

        return view('shop', compact('products', 'pageCategories'));
    }

    public function product(Product $product): View
    {
        $product->load('category');
        // todo: increase view

        return view('product', compact('product'));
    }

    public function category(Category $category)
    {
        // return view('category', compact('category'));
    }
}
