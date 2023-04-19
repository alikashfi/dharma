<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Mail;
use Illuminate\Mail\Mailable;

class OrderPaid extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Order $order)
    {
    }

    public function via(User $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(User $notifiable)
    {
        return (new \App\Mail\OrderPaid($notifiable, $this->order))
            ->to($notifiable->email);
    }

    public function toDatabase(User $notifiable): array
    {
        $price = number_format($this->order->price);
        return \Filament\Notifications\Notification::make()
            ->title("سفارشی به مبلغ  $price تومان (برای {$this->order->products()->count()} محصول)، پرداخت شد.")
            ->getDatabaseMessage();
    }

    // public function toArray(User $notifiable): array
    // {
    //     return [
    //         "format" => "filament"
    //     ];
    // }
}
