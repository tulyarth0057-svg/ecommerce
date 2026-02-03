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
                'bank_account' => 'required',
                'ifsc_code' => 'required|regex:/^[A-Z]{4}0[A-Z0-9]{6}$/',
                'account_holder_name' => 'required|string|max:255',
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
                'bank_account' => $request->bank_account,
                'ifsc_code' => strtoupper($request->ifsc_code),
                'account_holder_name' => $request->account_holder_name,
            ]);

 
            return response()->json([
                'message' => 'Profile updated successfully!',
            ]);
        }



}
