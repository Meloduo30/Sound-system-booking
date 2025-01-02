<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register form
    public function registerForm()
    {
        return view('auth.register');
    }

    // Register user
    public function register(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email|unique:users,email', // Ensure email is unique
            'password' => 'required|min:6'
        ]);

        // Create a new user instance
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash the password
        $user->save(); // Save the user to the database

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }

    // Login form
    public function loginForm()
    {
        return view('auth.login');
    }

    // Login user
    public function login(Request $request)
    {
        // Attempt to log in the user with the provided credentials
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('dashboard');
        }
        
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
