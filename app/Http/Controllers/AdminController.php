<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class AdminController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user')->get();
        return view('admin.dashboard.index', compact('bookings'));
    }

    public function adminDashboard()
    {
        $bookings = Booking::with('user')->paginate(10);
        $pendingBookings = Booking::where('status', 'pending')->count();
        return view('admin.dashboard.index', compact('bookings', 'pendingBookings'));
    }
}

