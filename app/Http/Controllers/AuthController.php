<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\CourierBoy;

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

    // User create
    User::create([
        'name' => $request->name,
        'email' => $request->email,
          'phone' => $request->phone,
        'password' => Hash::make($request->password),
    ]);

    // Return JSON instead of redirect
    return response()->json([
        'status' => true,
        'message' => 'User Registered Successfully!'
    ]);
}


public function signin(){
        return view ('signin');
    }


    

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



    

}






