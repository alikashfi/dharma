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
        $orders = Order::where('user_id', auth()->id())->with('status')->paginate(10);

        // if (! $orders->first()->status) {
        //     $orders->map(function ($order) {
        //         $order->status = Status::firstWhere('is_default', true);
        //     });
        // }

        return view('user.orders', compact('orders'));
    }

    public function payments()
    {
        $payments = Payment::where('user_id', auth()->id())->paginate(10);

        return view('user.payments', compact('payments'));
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
