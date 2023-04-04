<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutPageRequest;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Status;
use Cart;
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

    public function store(CheckoutPageRequest $request)
    {
        $order = $this->createOrder($request);

        // todo: notify
        // paymenting...
        Payment::create([
            'user_id'  => auth()->id(),
            'order_id' => $order->id,
            'ip'       => $request->ip(),
        ]);

        // call bank
        // redirect user to gateway

        Cart::clear();
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

    private function createOrder($request)
    {
        $products = IndexController::getProductsFromCart();
        $shipping = IndexController::getShippingFromCookie();

        $order = Order::create([
            'user_id'        => auth()->id(),
            'status_id'      => Status::firstWhere('is_default', true)->id,
            'shipping_id'    => $shipping->id,
            'price'          => $products->sum('price') + $shipping->price,
            'shipping_price' => $shipping->price,
            'comment'        => $request->comment,
        ]);

        $order->items()->sync($products->pluck('id')->toArray());

        return $order;
    }
}
