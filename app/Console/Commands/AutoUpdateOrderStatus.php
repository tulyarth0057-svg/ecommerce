<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Carbon\Carbon;

class AutoUpdateOrderStatus extends Command
{
    protected $signature = 'orders:auto-update';
    protected $description = 'Automatically update order status day by day';

    public function handle()
    {
        $orders = Order::with('latestStatus')->get();

        foreach ($orders as $order) {
            $latestStatus = $order->latestStatus?->status ?? $order->o_order_status ?? 'Pending';
            $lastUpdate = $order->latestStatus?->updated_at ?? $order->created_at;

            $days = Carbon::now()->diffInDays($lastUpdate);

            switch($latestStatus) {
                case 'Pending':
                    if($days >= 1){
                        $this->updateStatus($order, 'Processing');
                    }
                    break;

                case 'Processing':
                    if($days >= 2){
                        $this->updateStatus($order, 'Shipped');
                    }
                    break;

                case 'Shipped':
                    if($days >= 3){
                        $this->updateStatus($order, 'Delivered');
                    }
                    break;

                case 'Delivered':
                    break; // already delivered
            }
        }

        $this->info("Order statuses updated successfully!");
    }

    protected function updateStatus($order, $newStatus)
    {
        // Update the current status in orders table
        $order->update(['o_order_status' => $newStatus]);

        // Add to status timeline
        $order->statuses()->create(['status' => $newStatus]);

        $this->info("Order #{$order->o_order_number} updated to {$newStatus}");
    }
}
