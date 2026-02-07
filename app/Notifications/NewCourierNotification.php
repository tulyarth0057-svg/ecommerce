<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewCourierNotification extends Notification
{
    use Queueable;

    protected $courier;

    public function __construct($courier)
    {
        $this->courier = $courier;
    }

    // 👇 MAIL + DATABASE
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    // 👇 Bell notification
    public function toDatabase($notifiable)
    {
        return [
            'message' => 'New Courier Boy Registered: ' . $this->courier->name,
            'courier_id' => $this->courier->id
        ];
    }

    // 👇 Gmail notification
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Courier Boy Registered')
            ->greeting('Hello Admin 👋')
            ->line('A new courier boy has registered.')
            ->line('Name: ' . $this->courier->name)
            ->line('Email: ' . $this->courier->email)
            ->line('Mobile: ' . $this->courier->mobile)
            ->action('View Courier', url('/admin/courierboys'))
            ->line('Please verify courier account.');
    }
}
