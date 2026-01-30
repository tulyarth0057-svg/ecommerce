<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Log everything (useful for debugging)
        Log::info('Webhook received', $request->all());

        // Example payload
        $event = $request->input('event');
        $data  = $request->input('data');

        switch ($event) {
            case 'order.created':
                // Handle new order
                break;

            case 'payment.success':
                // Handle payment success
                break;

            case 'shipment.delivered':
                // Handle shipping update
                break;
        }

        return response()->json(['status' => 'ok'], 200);
    }
}
