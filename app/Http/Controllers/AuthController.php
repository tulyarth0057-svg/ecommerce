<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\CourierBoy;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function  showsignup()
    {
        return view('sign-up');
    }


public function signup(Request $request)
{
    // Validation
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|digits:10|unique:users,phone',
        'password' => 'required|string|min:6',
    ]);

    // OTP Generate
    $otp = rand(100000, 999999);

    // User Data aur OTP + timestamp session me store
    session([
        'signup_data' => $request->only('name','email','phone','password'),
        'signup_otp' => $otp,
        'signup_otp_time' => now() // current timestamp
    ]);

    // Gmail par OTP bhejo
    Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
        $message->to($request->email)
                ->subject('Signup OTP Verification');
    });

    // JSON response
    return response()->json([
        'status' => true,
        'message' => 'OTP sent to your email! Please verify to complete signup.'
    ]);
}


// ye h otp verify krna k function----->

public function verifyOtp(Request $request)
{
    $request->validate([
        'otp' => 'required|digits:6'
    ]);

    $otp = session('signup_otp');
    $otpTime = session('signup_otp_time');

    if(!$otp || !$otpTime){
        return response()->json([
            'status' => false,
            'message' => 'OTP expired. Please try signing up again.'
        ]);
    }

    // Check if OTP is older than 2 minutes
    if(now()->diffInMinutes($otpTime) > 2){
        session()->forget(['signup_data','signup_otp','signup_otp_time']);
        return response()->json([
            'status' => false,
            'message' => 'OTP has expired. Please request a new one.'
        ]);
    }

    // OTP match check
    if($request->otp != $otp){
        return response()->json([
            'status' => false,
            'message' => 'Invalid OTP'
        ]);
    }

    $data = session('signup_data');

    // User create
    User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'password' => Hash::make($data['password']),
        'email_verified_at' => now() // mark verified
    ]);

    // Session clear
    session()->forget(['signup_data','signup_otp','signup_otp_time']);

    return response()->json([
        'status' => true,
        'message' => 'Signup completed successfully!'
    ]);
}




// public function signin(){
//         return view ('signin');
//     }

      // Handle Login
public function post_signin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {

        $request->session()->regenerate();
        $user = Auth::user();

        // Role based redirect
if ($user->role === 'admin') {
    $redirectUrl = route('admin.dashboard');
} else {
    $previousUrl = url()->previous();

    // prevent redirect loop to login
    if (str_contains($previousUrl, 'login')) {
        $previousUrl = url('/');
    }

    $redirectUrl = $previousUrl;
}



        return response()->json([
            'status'   => true,
            'role'     => $user->role,
            'redirect' => $redirectUrl,
            'message'  => 'Signin successful'
        ]);
    }

    return response()->json([
        'status' => false,
        'message' => 'Invalid email or password'
    ], 401);
}


    // LOGOUT SYSTEM
public function logout(Request $request)
{
    Auth::logout(); // Log out the user

    $request->session()->invalidate(); // Invalidate the session
    $request->session()->regenerateToken(); // Regenerate CSRF token

        // Flash a session message for SweetAlert
    $request->session()->flash('success', 'Logout successful!');

    return redirect('/'); // Redirect to home page
}





// controller of contact list in admin panel---->

   public function showContactlist()
    {
      
   $users = User::latest()->get();
    return view('admin.contact-list', compact('users'));
    
    }

 // delecte route of contact list in admin panel---->

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully!');
    }
    

// route of courier-boy-list---->
public function showCourierboylist()
{
    // Fetch all courier boys
    $courierboys = CourierBoy::all(); // Make sure you have the Courier model

    // Pass to the view
    return view('admin.courierboy-list', compact('courierboys'));
}

public function viewCourierboy($id)
{
    $courier = CourierBoy::findOrFail($id);
    return view('admin.courierboy-view', compact('courier'));
}

public function getEditCourierboy($id)
{
    $courier = CourierBoy::findOrFail($id);
    return view('admin.edit-courierboy', compact('courier')); 
}


public function postEditCourierboy(Request $request)
{
    $id = $request->input('id');

    $courier = CourierBoy::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:courier_boys,email,' . $courier->id,
        'mobile' => 'required|digits:10',

        'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'rc_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'aadhar_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        'bank_account' => 'required',
        'ifsc_code' => 'required|regex:/^[A-Z]{4}0[A-Z0-9]{6}$/',
        'account_holder_name' => 'required|string|max:255',
    ]);

    /*
    |--------------------------------------------------------------------------
    | Profile Photo Upload
    |--------------------------------------------------------------------------
    */

    if ($request->hasFile('profile_photo')) {

        if ($courier->profile_photo) {
            Storage::disk('public')->delete($courier->profile_photo);
        }

        $courier->profile_photo = $request->file('profile_photo')
            ->store('courier/profile_photos', 'public');
    }

    /*
    |--------------------------------------------------------------------------
    | RC Photo Upload
    |--------------------------------------------------------------------------
    */

    if ($request->hasFile('rc_photo')) {

        if ($courier->vehicle_rc) {
            Storage::disk('public')->delete($courier->vehicle_rc);
        }

        $courier->vehicle_rc = $request->file('rc_photo')
            ->store('courier/rc_photos', 'public');
    }

    /*
    |--------------------------------------------------------------------------
    | Aadhar Upload
    |--------------------------------------------------------------------------
    */

    if ($request->hasFile('aadhar_photo')) {

        if ($courier->id_proof) {
            Storage::disk('public')->delete($courier->id_proof);
        }

        $courier->id_proof = $request->file('aadhar_photo')
            ->store('courier/aadhar_photos', 'public');
    }

    /*
    |--------------------------------------------------------------------------
    | Update Other Fields
    |--------------------------------------------------------------------------
    */

    $courier->name = $request->name;
    $courier->email = $request->email;
    $courier->mobile = $request->mobile;
    $courier->bank_account = $request->bank_account;
    $courier->ifsc_code = strtoupper($request->ifsc_code);
    $courier->account_holder_name = $request->account_holder_name;

    $courier->save();

    return response()->json([
        'message' => 'Profile updated successfully!',
    ]);
}


    

}






