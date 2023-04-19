<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class OrderCreated extends Notification // implements ShouldQueue
{
    use Queueable;

    public function __construct(public Order $order)
    {
    }

    public function via(User $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(User $notifiable): array
    {
        $price = number_format($this->order->price);
        return \Filament\Notifications\Notification::make()
            ->title("سفارشی به مبلغ  $price تومان (برای {$this->order->products()->count()} محصول)، ساخته شد!")
            ->getDatabaseMessage();
    }
}
