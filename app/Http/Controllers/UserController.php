<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function orders()
    {
        $orders = Order::where('user_id', auth()->id())->paginate(10);

        return view('user.orders', compact('orders'));
    }

    public function payments()
    {
        $payments = Payment::where('user_id', auth()->id())->paginate(10);

        return view('user.payments', compact('payments'));
    }

    public function settings()
    {
        return view('user.settings');
    }
}
