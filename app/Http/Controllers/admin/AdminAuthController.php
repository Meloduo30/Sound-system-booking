<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->filled('remember'))) {
            return redirect()->intended(route('adminDashboard'))->with('success', 'You are logged in...');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}

