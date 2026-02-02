<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CourierDashboardController extends Controller
{
    // Dashboard
    public function index()
    {
        $courierId = Auth::id();

        return view('courier.courierdashboard', [
            'assigned'  => Order::where('courier_id', $courierId)
                                ->where('o_order_status', 'assigned')
                                ->count(),

            'pending'   => Order::where('courier_id', $courierId)
                                ->where('o_order_status', 'pending')
                                ->count(),

            'completed' => Order::where('courier_id', $courierId)
                                ->where('o_order_status', 'delivered')
                                ->count(),
        ]);
    }

    // Assigned Orders
    public function assigned()
    {
        $orders = Order::where('courier_id', Auth::id())
                        ->where('o_order_status', 'assigned')
                        ->get();

        return view('courier.assigned-order', compact('orders'));
    }

    // Pending Deliveries
    public function pending()
    {
        $orders = Order::where('courier_id', Auth::id())
                        ->where('o_order_status', 'pending')
                        ->get();

        return view('courier.pending-deliveries', compact('orders'));
    }

    // Completed Deliveries
    public function completed()
    {
        $orders = Order::where('courier_id', Auth::id())
                        ->where('o_order_status', 'delivered')
                        ->get();

        return view('courier.completed-deliveries', compact('orders'));
    }
}
