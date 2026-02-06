<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewOrderNotification extends Notification
{
    use Queueable;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

   public function toArray($notifiable)
{
    return [
        'title' => 'New Order Received',
        'message' => 'New Order #' . $this->order->o_order_number,
        'order_id' => $this->order->o_id
    ];
}

}
