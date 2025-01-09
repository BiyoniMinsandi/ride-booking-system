<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'license_plate' => 'required|unique:vehicles|max:255',
            'type' => 'required|string|max:255',
            'capacity' => 'required|numeric|min:1',
        ]);

        Vehicle::create($request->only(['license_plate', 'type', 'capacity']));
        return redirect('/vehicles.index')->with('success', 'Vehicle added successfully.');
    }

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $request->validate([
            'license_plate' => 'required|unique:vehicles,license_plate,' . $vehicle->id . '|max:255',
            'type' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);
    
        $vehicle->update($request->only(['license_plate', 'type', 'capacity']));
       // $vehicle->update($request->all());
        return redirect('/vehicles')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return redirect('/vehicles')->with('success', 'Vehicle deleted successfully.');
    }
}
