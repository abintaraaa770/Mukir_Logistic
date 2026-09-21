<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Show booking form
    public function showForm()
    {
        return view('booking');
    }

    // Save booking to database and redirect to success
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'origin' => 'required|string',
            'destination' => 'required|string',
            'truck_type' => 'required|string|max:100',
            'date' => 'required|date|after_or_equal:today',
        ]);

        // Generate unique tracking code
        do {
            $trackingCode = 'TRX-' . rand(10000, 99999);
        } while (Booking::where('tracking_code', $trackingCode)->exists());

        // Create booking with status pending
        $booking = Booking::create([
            'tracking_code' => $trackingCode,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'origin' => $validated['origin'],
            'destination' => $validated['destination'],
            'truck_type' => $validated['truck_type'],
            'date' => $validated['date'],
            'status' => 'pending',
        ]);

        return redirect()->route('booking.success', ['code' => $trackingCode]);
    }

    // Show success page
    public function success($code)
    {
        $booking = Booking::where('tracking_code', $code)->firstOrFail();
        return view('booking_success', compact('booking'));
    }

    // Show tracking page and handle search
    public function showTracking(Request $request)
    {
        $booking = null;
        $searched = false;
        $code = $request->get('code');

        if ($code) {
            $searched = true;
            $booking = Booking::where('tracking_code', trim($code))->first();
        }

        return view('tracking', compact('booking', 'searched', 'code'));
    }
}
