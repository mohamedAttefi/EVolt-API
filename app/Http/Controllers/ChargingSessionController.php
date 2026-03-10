<?php

namespace App\Http\Controllers;

use App\Models\ChargingSession;
use Illuminate\Http\Request;

class ChargingSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['ChargingSessions' => ChargingSession::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ChargingSession::create([
            'user_id' => $request->user_id,
            'reservation_id' => $request->reservation_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'energy_delivered' => $request->energy_delivered,
        ]);

        return response()->json(['message' => 'charging session created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ChargingSession $chargingSession)
    {
        return response()->json(['ChargingSession' => $chargingSession]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChargingSession $chargingSession)
    {
        $chargingSession->update([
            'user_id' => $request->user_id,
            'reservation_id' => $request->reservation_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'energy_delivered' => $request->energy_delivered,
        ]);

        return response()->json(['message' => 'charging session updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChargingSession $chargingSession)
    {
        $chargingSession->delete();
        return response()->json(['message' => 'charging session deleted successfully']);
    }
}
