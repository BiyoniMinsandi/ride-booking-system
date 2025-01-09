@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Vehicles</h1>
    <a href="#" data-bs-toggle="modal" data-bs-target="#addVehicleModal" class="btn btn-primary mb-3">Add Vehicle</a>
    <ul>
        @foreach ($vehicles as $vehicle)
            <li>
                {{ $vehicle->license_plate }} - {{ $vehicle->type }} (Capacity: {{ $vehicle->capacity }})
                <form method="POST" action="/vehicles/{{ $vehicle->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>

<!-- Modal for Adding a Vehicle -->
<div class="modal fade" id="addVehicleModal" tabindex="-1" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="/vehicles">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addVehicleModalLabel">Add Vehicle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="license_plate" class="form-label">License Plate</label>
                    <input type="text" class="form-control" id="license_plate" name="license_plate" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" class="form-control" id="type" name="type" required>
                </div>
                <div class="mb-3">
                    <label for="capacity" class="form-label">Capacity</label>
                    <input type="number" class="form-control" id="capacity" name="capacity" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add Vehicle</button>
            </div>
        </div>
    </form>
  </div>
</div>
@endsection
