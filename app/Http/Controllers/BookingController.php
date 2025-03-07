<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\Table;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'table_id' => 'required|exists:tables,id',
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'booking_time' => 'required|date',
            'guest_count' => 'required|integer|min:1',
        ]);

        $table = Table::query()->findOrFail($request->table_id);

        $existingSeats = Booking::query()
            ->where('table_id', $table->id)
            ->where('booking_time', $request->booking_time)
            ->sum('guest_count');

        if ($existingSeats + $request->guest_count > $table->capacity) {
            return response()->json(['message' => 'Not enough seats available'], 400);
        }

        $booking = Booking::query()->create($validated);

        return response()->json($booking, 201);
    }

    public function index(Request $request)
    {
        $request->validate(['date' => 'required|date']);

        $bookings = Booking::query()
            ->with('table')
            ->whereDate('booking_time', $request->date)
            ->orderBy('booking_time')
            ->get();

        return response()->json(BookingResource::collection($bookings));
    }

    public function destroy($id)
    {
        $booking = Booking::query()->findOrFail($id);

        if (now()->diffInHours($booking->booking_time) < 2) {
            return response()->json(['message' => 'Cannot cancel less than 2 hours before reservation'], 400);
        }

        $booking->delete();

        return response()->json(['message' => 'Booking canceled']);
    }
}
