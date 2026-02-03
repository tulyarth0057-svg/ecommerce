<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourierBoy;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class CourierBoyController extends Controller
{
    // Show signup form
    public function courierBoycreate() {
        return view('courierboy.signup');
    }

    // Handle form submission
    public function courierBoystore(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|digits:10|unique:courier_boys',
            'email' => 'required|email|unique:courier_boys',
            'password' => 'required|min:6|confirmed',
            'address' => 'required',
            'id_type' => 'required',
            'profile_photo' => 'required|image|mimes:jpg,jpeg,png',
            'id_proof' => 'required|mimes:jpg,jpeg,png,pdf',
            'vehicle_type' => 'required',
            'vehicle_number' => 'required',
            'vehicle_rc' => 'required|mimes:jpg,jpeg,png,pdf',
            'bank_account' => 'required',
            'ifsc_code' => 'required|regex:/^[A-Z]{4}0[A-Z0-9]{6}$/',
            'account_holder_name' => 'required|string|max:255',
        ]);

       // 2️⃣ Store files (single files)
    $profilePhotoPath = $request->file('profile_photo')->store('courier/profile_photos', 'public');
    $idProofPath = $request->file('id_proof')->store('courier/id_proofs', 'public');
    $vehicleRcPath = $request->file('vehicle_rc')->store('courier/vehicle_rcs', 'public');


        CourierBoy::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'id_type' => $request->id_type,
            'profile_photo' => $profilePhotoPath,
            'id_proof' => $idProofPath,
            'vehicle_type' => $request->vehicle_type,
            'vehicle_number' => $request->vehicle_number,
            'vehicle_rc' => $vehicleRcPath,
            'ifsc_code' => strtoupper($request->ifsc_code), 
            'account_holder_name' => $request->account_holder_name,
            'bank_account' => $request->bank_account,
        ]);

        return response()->json([
    'status' => true,
    'message' => 'Signup successful! Waiting for admin verification.'
]);
    }

    // signinhandler

    // show login form
    public function showLoginForm()
    {
        return view('courierboy.loginform'); // blade path
    }

    // handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        // courier guard login
        if (Auth::guard('courier')->attempt($credentials)) {

            $request->session()->regenerate();

            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'redirect' => route('courier.dashboard')
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Invalid email or password'
        ], 401);
    }

    // logout
    public function logout(Request $request)
    {
        Auth::guard('courier')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

               // Flash a session message for SweetAlert
        $request->session()->flash('success', 'Logout successful!');
        return redirect('/'); 
    }

}
