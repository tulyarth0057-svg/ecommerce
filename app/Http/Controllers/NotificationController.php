<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // 🔔 All notifications
    public function index()
    {
        $notifications = Auth::user()->notifications;
        return view('notifications.index', compact('notifications'));
    }

    // 🔴 Unread notifications
    public function unread()
    {
        $notifications = Auth::user()->unreadNotifications;
        return view('notifications.index', compact('notifications'));
    }

    // ✅ Mark all as read
    public function markAllRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back()->with('success', 'All notifications marked as read');
    }

    // ✅ Mark single as read
    public function markRead($id)
    {
        $notification = Auth::user()
            ->notifications()
            ->where('id', $id)
            ->firstOrFail();

        $notification->markAsRead();

        return redirect()->back();
    }
}
