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
        $rides = Ride::where('user_id', Auth::id())->paginate(10); // Paginate the rides
        return view('rides.index', compact('rides'));
    }

    public function create()
    {
        $vehicles = Vehicle::all();
        return view('rides.create', compact('vehicles'));
    }

    public function store(Request $request)
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
        ]);

        return redirect()->route('rides.index')->with('status', 'Ride created successfully!');
    }

    public function edit($id)
    {
        $ride = Ride::findOrFail($id);
        $vehicles = Vehicle::all();
        return view('rides.edit', compact('ride', 'vehicles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pickup_location' => 'required|string|max:255',
            'dropoff_location' => 'required|string|max:255',
            'vehicle_id' => 'nullable|exists:vehicles,id',
        ]);

        $ride = Ride::findOrFail($id);
        $ride->update([
            'pickup_location' => $request->pickup_location,
            'dropoff_location' => $request->dropoff_location,
            'vehicle_id' => $request->vehicle_id,
            'status' => $request->status,
        ]);

        return redirect()->route('rides.index')->with('status', 'Ride updated successfully!');
    }

    public function destroy($id)
    {
        $ride = Ride::findOrFail($id);
        $ride->delete();
        return redirect()->route('rides.index')->with('status', 'Ride deleted successfully!');
    }
}