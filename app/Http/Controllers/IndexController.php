<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cookie;
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

    public function cart()
    {
        return view('pages.cart');
    }

    public function checkout()
    {
        $products = $this->getProductsFromCart();

        $shipping = $this->getShippingFromCookie();

        return view('pages.checkout', compact('products', 'shipping'));
    }

    public static function getProductsFromCart(): Collection|array
    {
        $products = \Cart::getContent() ?? [];
        if (count($products)) {
            $ids = $products->pluck('id')->toArray();
            $sortedIds = implode(',', $ids);

            $products = Product::whereIn('id', $ids)->orderByRaw("FIELD(id, $sortedIds)")->get();
        }
        return $products;
    }

    public static function getShippingFromCookie(): Shipping
    {
        if ($shippingId = Cookie::get('selectedShippingId'))
            $shipping = Shipping::firstWhere('id', $shippingId);
        else
            $shipping = Shipping::first();
        return $shipping;
    }
}
