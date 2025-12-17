<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        'password' => 'required|string|min:6',
    ]);

    // User create
    User::create([
        'name' => $request->name,
        'email' => $request->email,
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
   public function authenticate(Request $request)
{
    // Validate input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    // Attempt login
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // secure session

        $user = Auth::user();

        if($user->role === 'admin'){
            // Admin → dashboard redirect
            return redirect()->route('admin.dashboard')->with('success', 'Signin successful!');
        } else {
            // Normal user → current page stay
            return back()->with('success', 'Signin successful!');
        }
    }

    return back()->with('error', 'Invalid email or password')->withInput();
}





    // LOGOUT SYSTEM
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
          return redirect('/')->with('swal_success', 'Logout successful!');

    }

}






