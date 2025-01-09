<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RideController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        $rides = Ride::where('user_id', Auth::id())->get();
        return view('rides.index', compact('rides', 'vehicles'));
    }

    /*public function store(Request $request)
    {
        $request->validate([
            'pickup_location' => 'required|string|max:255',
            'dropoff_location' => 'required|string|max:255',
            'vehicle_id' => 'nullable|exists:vehicles,id',
        ]);

        Ride::create([
            'user_id' => Auth::id(),
            'pickup_location' => $request->pickup_location,
            'dropoff_location' => $request->dropoff_location,
            'vehicle_id' => $request->vehicle_id,
            'status' => 'pending',
        ]);*/
        public function store(Request $request)
{
    // Validate and create the ride
    $request->validate([
        'ride_name' => 'required|string|max:255',
        // Add other validation rules as needed
    ]);

    $ride = Ride::create([
        'name' => $request->ride_name,
        // Add other fields to be saved
    ]);

    return redirect()->route('rides.index');  // Redirect to the ride index page after creating
}


        //return redirect()->route('rides.index')->with('success', 'Ride booked successfully.');
    }
