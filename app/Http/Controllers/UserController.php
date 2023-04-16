<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDetailsRequest;
use App\Http\Requests\UserSettingsRequest;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Status;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function orders()
    {
        $orders = Order::where('user_id', auth()->id())->with('status')->latest()->paginate(10);
        return view('user.orders', compact('orders'));
    }

    public function orderDetails(Order $order)
    {
        $order->load('products');
        return view('user.order-details', compact('order'));
    }

    public function payments()
    {
        $payments = Payment::where('user_id', auth()->id())->with('order')->latest()->paginate(10);
        return view('user.payments', compact('payments'));
    }

    public function paymentDetails(Payment $payment)
    {
        $payment->load('order');
        return view('user.payment-details', compact('payment'));
    }

    public function details()
    {
        return view('user.details');
    }

    public function settings()
    {
        return view('user.settings');
    }

    public function detailsForm(UserDetailsRequest $request)
    {
        auth()->user()->update($request->validated());
        return flashBack();
    }

    public function settingsForm(UserSettingsRequest $request)
    {
        auth()->user()->update($request->validated());
        return flashBack();
    }
}
