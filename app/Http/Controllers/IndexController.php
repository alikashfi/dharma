<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
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
        $products = Product::latest()->limit(6)->get();
        $nextProducts = Product::latest()->skip(6)->limit(3)->get();

        return view('pages.home', compact('products', 'nextProducts'));
    }

    public function shop(): View
    {
        $products = Product::paginate(10);

        return view('pages.shop', compact('products'));
    }

    public function product(Product $product): View
    {
        $product->load('category')->increaseView();

        $similarProducts = Product::whereCategoryId($product->category_id)->latest()->take(12)->get();
        if ($similarProducts->count() < 4)
            $similarProducts = Product::whereCategoryId($product->category->parent->id)->latest()->take(12)->get();

        return view('pages.product', compact('product', 'similarProducts'));
    }

    public function category(Category $category)
    {
        $categories = array_merge($category->subCategories()->pluck('id')->toArray(), [$category->id]);
        $products = Product::whereIn('category_id', $categories)->paginate(10);

        return view('pages.category', compact('products', 'category'));
    }

    public function cart()
    {
        return view('pages.cart');
    }

    public function checkout()
    {
        $products = $this->getProductsFromCart();
        if ( ! count($products))
            return redirect()->route('cart')->withErrors('سبد خرید خالیست!');

        $shipping = $this->getShippingFromCookie();

        return view('pages.checkout', compact('products', 'shipping'));
    }

    public function page(Page $page)
    {
        return view('pages.page', compact('page'));
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
