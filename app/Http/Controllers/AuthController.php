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
   public function post_signin(Request $request)
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
            // Admin → dashboard
            return redirect()->route('admin.dashboard')->with('success', 'Signin successful!');
        } else {
            // Normal user → current page
            return back()->with('success', 'Signin successful!');
        }
    }

    return back()->with('error', 'Invalid email or password')->withInput();
}


// public function post_signin(Request $request)
// {
//     // Validate input
//     $request->validate([
//         'email'    => 'required|email',
//         'password' => 'required|string',
//     ]);

//     $credentials = $request->only('email', 'password');

//     // Attempt login
//     if (Auth::attempt($credentials)) {

//         $request->session()->regenerate();
//         $user = Auth::user();

//         /* =========================
//            ADMIN → NORMAL REDIRECT
//         ========================== */
//         if ($user->role === 'admin') {

//             // agar AJAX nahi hai → direct redirect
//             if (!$request->expectsJson()) {
//                 return redirect()
//                     ->route('admin.dashboard')
//                     ->with('success', 'Signin successful!');
//             }

//             // agar AJAX hai → JSON bhejo
//             return response()->json([
//                 'status'  => true,
//                 'role'    => 'admin',
//                 'message' => 'Signin successful!'
//             ]);
//         }

//         /* =========================
//            USER → AJAX (NO RELOAD)
//         ========================== */
//         return response()->json([
//             'status'  => true,
//             'role'    => 'user',
//             'message' => 'Signin successful!'
//         ]);
//     }

//     /* =========================
//        LOGIN FAILED
//     ========================== */

//     // AJAX request → SweetAlert error
//     if ($request->expectsJson()) {
//         return response()->json([
//             'status'  => false,
//             'message' => 'Invalid email or password'
//         ], 401);
//     }

//     // Normal form submit → back with error
//     return back()
//         ->with('error', 'Invalid email or password')
//         ->withInput();
// }

    // LOGOUT SYSTEM
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
          return redirect('/')->with('swal_success', 'Logout successful!');

    }

}






