<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewProductNotification extends Notification
{
    public function __construct(public $product) {}

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'New Product Launched 🎉',
            'message' => $this->product->p_name . ' ab available hai!',
            'product_id' => $this->product->p_id,
            'price' => $this->product->p_price,
        ];
    }
}

