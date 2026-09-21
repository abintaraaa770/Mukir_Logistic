<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    // List bookings with search and filter
    public function index(Request $request)
    {
        $query = Booking::query();

        // Search by name or tracking code
        if ($search = $request->get('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('tracking_code', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($status = $request->get('status')) {
            $query->where('status', $status);
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('admin.bookings.index', compact('bookings'));
    }

    // Show manual booking form
    public function create()
    {
        return view('admin.bookings.create');
    }

    // Save a manually created booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'origin' => 'required|string',
            'destination' => 'required|string',
            'truck_type' => 'required|string|max:100',
            'date' => 'required|date',
            'status' => 'required|string|in:pending,approved,in_transit,completed,cancelled',
            'driver_name' => 'nullable|string|max:255',
            'plate_number' => 'nullable|string|max:20',
            'tracking_lat' => 'nullable|numeric|between:-90,90',
            'tracking_lng' => 'nullable|numeric|between:-180,180',
            'notes' => 'nullable|string',
        ]);

        // Generate unique tracking code
        do {
            $trackingCode = 'TRX-' . rand(10000, 99999);
        } while (Booking::where('tracking_code', $trackingCode)->exists());

        Booking::create(array_merge($validated, ['tracking_code' => $trackingCode]));

        return redirect()->route('admin.bookings.index')->with('success', 'Booking berhasil dibuat manual dengan Kode Lacak: ' . $trackingCode);
    }

    // Show edit form
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.bookings.edit', compact('booking'));
    }

    // Update booking details
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'origin' => 'required|string',
            'destination' => 'required|string',
            'truck_type' => 'required|string|max:100',
            'date' => 'required|date',
            'status' => 'required|string|in:pending,approved,in_transit,completed,cancelled',
            'driver_name' => 'nullable|string|max:255',
            'plate_number' => 'nullable|string|max:20',
            'tracking_lat' => 'nullable|numeric|between:-90,90',
            'tracking_lng' => 'nullable|numeric|between:-180,180',
            'notes' => 'nullable|string',
        ]);

        $booking->update($validated);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking dengan Kode ' . $booking->tracking_code . ' berhasil diperbarui.');
    }

    // Delete booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $code = $booking->tracking_code;
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking ' . $code . ' telah dihapus.');
    }
}
