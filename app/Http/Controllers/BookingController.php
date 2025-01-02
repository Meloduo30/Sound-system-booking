<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingStatusUpdate;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $bookings = Booking::all();
        // where('user_id', Auth::id())
        //     ->where('equipment_name', 'LIKE', "%{$search}%")
        //     ->latest()
        //     ->get();

        return view('bookings.index', compact('bookings', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipment_name' => 'required|string',
            'booking_date' => 'required|date',
        ]);


        $booking = new Booking();
        $booking->equipment_name = $request->input('equipment_name');
        $booking->booking_date = $request->input('booking_date');
        $booking->user_id = 1;
        $booking->status = 'pending';

        $booking->save();

        return redirect()->back()->with('success', 'Booking created successfully.');
    }

    public function approve(Booking $booking)
    {
        if ($booking->status !== 'pending') {
            return redirect()->route('bookings.index')->with('error', 'Booking request cannot be approved.');
        }

        $booking->update(['status' => 'approved']);

        if ($booking->user) {
            Mail::to($booking->user->email)->send(new BookingStatusUpdate($booking));
        }

        return redirect()->route('bookings.index')->with('success', 'Booking request approved successfully!');
    }

    public function reject(Booking $booking)
    {
        if ($booking->status !== 'pending') {
            return redirect()->route('bookings.index')->with('error', 'Booking request cannot be rejected.');
        }

        $booking->update(['status' => 'rejected']);

        if ($booking->user) {
            Mail::to($booking->user->email)->send(new BookingStatusUpdate($booking));
        }

        return redirect()->route('bookings.index')->with('success', 'Booking request rejected successfully!');
    }
}

