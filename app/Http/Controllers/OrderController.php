<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // $this->createOrder();
        $products = IndexController::getProductsFromCart();
        $shipping = IndexController::getShippingFromCookie();

        $order = Order::create([
            'user_id' => auth()->id,
            'status_id' => null,
            'shipping_id' => $shipping->id,
            'price' => $products->sum('price') + $shipping->price,
            'shipping_price' => $products->sum('price') + $shipping->price,
            'ip' => $request->ip(),
            'comment' => $request->comment,
        ]);

        $order->items()->sync($products->pluck()->toArray());

        // notify
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
