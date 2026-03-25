<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::paginate(15);
        return response()->json(['reservations' => $reservations]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        $validated = $request->validated();
        // Use validated data
        $reservation = Reservation::create($validated);
        return response()->json(['reservation' => $reservation], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return response()->json(['resevration' => $reservation]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update([
            'user_id' => $request->user_id,
            'charging_station_id' => $request->charging_station_id,
            'start_time' => $request->start_time,
            'duration' => $request->duration,
            'status' => $request->status
        ]);

        return response()->json(['message' => 'reservation updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return response()->json(['message' => 'reservation deleted successfully']);
    }
}
