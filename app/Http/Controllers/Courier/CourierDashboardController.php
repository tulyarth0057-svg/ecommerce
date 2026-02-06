<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class CourierDashboardController extends Controller
{
public function index()
{
    $courierId = Auth::guard('courier')->id();

    return view('courier.courierdashboard', [
        'assigned'  => Order::where('courier_id', $courierId)
                             ->whereIn('o_order_status', ['confirmed','pending'])
                            ->count(),

        'pending'   => Order::where('courier_id', $courierId)
                            ->where('o_order_status', 'processing')
                            ->count(),

        'completed' => Order::where('courier_id', $courierId)
                            ->where('o_order_status', 'shipped')
                            ->count(),
    ]);
}



    // Assigned Orders list----->
 public function assigned()
{
    $orders = Order::where('courier_id', Auth::guard('courier')->id())
                     ->whereIn('o_order_status', ['confirmed','pending'])
                    ->get();

    return view('courier.assigned-order', compact('orders'));
}



       // Single Order View
    public function viewOrder($orderId)
    {
        $order = Order::where('o_id', $orderId)->firstOrFail();

        return view('courier.assigned-view', compact('order'));
    }



    // Pending Deliveries
    public function pending()
{


    $orders = Order::where('courier_id', Auth::guard('courier')->id())
                    ->where('o_order_status', 'processing')
                    ->get();

    return view('courier.pending-deliveries', compact('orders'));
}


public function completed()
{
    $orders = Order::where('courier_id', Auth::guard('courier')->id())
                    ->where('o_order_status', 'shipped')
                    ->get();

    return view('courier.completed-deliveries', compact('orders'));
}

    // courierboyprofilepage----->
            
        public function profile()
        {
            $courier = Auth::guard('courier')->user();

            return view('courier.courierboy-profile', compact('courier'));
        }

        public function getProfileUpdate(){

     
           $courier = Auth::guard('courier')->user();
            return view('courier.update-profile', compact('courier'));
        }




        public function profileUpdate(Request $request)
        {
            $courier = Auth::guard('courier')->user();

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:courier_boys,email,' . $courier->id,
                'mobile' => 'required|digits:10',
                'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                // 'bank_account' => 'required',
                // 'ifsc_code' => 'required|regex:/^[A-Z]{4}0[A-Z0-9]{6}$/',
                // 'account_holder_name' => 'required|string|max:255',
            ]);

            // image upload
            if ($request->hasFile('profile_photo')) {

                if ($courier->profile_photo) {
                    Storage::disk('public')->delete($courier->profile_photo);
                }

                $path = $request->file('profile_photo')
                    ->store('courier/profile_photos', 'public');

                $courier->profile_photo = $path;
            }

            $courier->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                // 'bank_account' => $request->bank_account,
                // 'ifsc_code' => strtoupper($request->ifsc_code),
                // 'account_holder_name' => $request->account_holder_name,
            ]);

 
            return response()->json([
                'message' => 'Profile updated successfully!',
            ]);
        }


        // courierpickedupin-btn-assinged-list--controller---->
        public function markPickedUp($id)
{
    $order = Order::where('o_id', $id)
        ->where('courier_id', Auth::guard('courier')->id())
        ->firstOrFail();

    $order->update([
        'o_order_status' => 'processing'
    ]);

    return response()->json([
                'message' => 'Order picked successfully!',
            ]);
}


// picked up orders-page---->
public function getPickedUpOrders()
{
    $orders = Order::where('courier_id', Auth::guard('courier')->id())
                    ->where('o_order_status', 'processing') // picked status
                    ->get();

    return view('courier.pickeduporder-list', compact('orders'));
}

// markupbtn-in-pickuped-list---->
public function markDelivered($id)
{
    $order = Order::find($id);

    if (!$order) {
        return response()->json([
            'status' => false,
            'message' => 'Order not found'
        ]);
    }

    $order->o_order_status = 'shipped';
    $order->save();

    return response()->json([
        'status' => true,
        'message' => 'Order Delivered Successfully'
    ]);
}






}
