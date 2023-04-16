<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutPageRequest;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Status;
use Cart;
use DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;
use Str;

class OrderController extends Controller
{
    public function order(CheckoutPageRequest $request)
    {
        if ( ! auth()->user()->hasDetails()) {
            auth()->user()->update($request->validated());
        }

        return DB::transaction(function() use ($request){
            $order = $this->createOrder($request);

            // todo: notify

            return tap($this->createPaymentAndPay($order), fn() => Cart::clear());
        });
    }

    private function createOrder($request): Order
    {
        $products = IndexController::getProductsFromCart();
        $shipping = IndexController::getShippingFromCookie();

        return tap(Order::create([
            'user_id'        => auth()->id(),
            'shipping_id'    => $shipping->id,
            'price'          => $products->sum('price') + $shipping->price,
            'shipping_price' => $shipping->price,
            'comment'        => $request->comment,
        ]), fn($order) => $order->products()->sync($products->pluck('id')->toArray()));
    }

    public function createPaymentAndPay(Order $order)
    {
        $invoice = (new Invoice)->amount(toRial($order->price));
        $invoice->detail('Title', 'خرید از ' . config('app.name'));

        $payment = new Payment;
        $payment->user_id = auth()->id();
        $payment->order_id = $order->id;
        $payment->ip = request()->ip();
        $payment->uuid = Str::uuid();
        $payment->save();

        try {
            // request gateway and redirect user to it.
            return ShetabitPayment::callbackUrl(route('payment-callback', ['uuid' => $payment->uuid]))->purchase(
                $invoice,
                function($driver, $transactionId) use ($payment) {
                    $payment->trans1 = $transactionId;
                    $payment->save();
                }
            )->pay()->render();
        } catch (\Exception $e) {
            report($e);
            return redirect()->route('cart')->withErrors('مشکلی در ارتباط با درگاه پرداخت پیش آمده. لطفا بعدا مجددا تلاش کنید.');
        }
    }

    public function paymentCallback(Request $request, $uuid)
    {
        // todo: notify
        try {
            $payment = Payment::whereUuid($uuid)->whereIsPaid(false)->with('order')->firstOrFail();

            $receipt = ShetabitPayment::amount(toRial($payment->order->price))->transactionId($request->token)->verify();

            $payment->trans2 = $receipt->getReferenceId();
            $payment->is_paid = 1;
            $payment->save();
            $payment->order()->update(['is_paid' => 1, 'status_id' => Status::firstWhere('slug', 'processing')->id]);

            return flashBack('پرداخت با موفقیت انجام شد.', 'user.orders');
        } catch (InvalidPaymentException $e) {
            $payment->result = $e->getMessage();
            $payment->order()->update(['status_id' => Status::firstWhere('slug', 'failed')->id]);
            $payment->save();
            return redirect()->route('user.payments')->withErrors($e->getMessage());
        } catch (\Exception $e) {
            report($e);
            return redirect()->route('cart')->withErrors('مشکلی در ارتباط با درگاه پرداخت پیش آمد. ما مشکل را بررسی کرده و در صورت لزوم با شما تماس میگیریم.');
        }
    }
}
