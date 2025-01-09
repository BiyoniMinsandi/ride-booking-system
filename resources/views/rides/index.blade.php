@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Rides</h1>
    <a href="#" data-bs-toggle="modal" data-bs-target="#bookRideModal" class="btn btn-primary mb-3">Book a Ride</a>
    
    <!-- Displaying the list of rides -->
    @if($rides->isEmpty())
        <p>No rides available.</p>
    @else
        @foreach ($rides as $ride)
            <div>
                <p>{{ $ride->pickup_location }} to {{ $ride->dropoff_location }} ({{ $ride->status }})</p>
            </div>
        @endforeach
    @endif
</div>

<!-- Modal for Booking a Ride -->
<div class="modal fade" id="bookRideModal" tabindex="-1" aria-labelledby="bookRideModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('rides.store') }}">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookRideModalLabel">Book a Ride</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="pickup_location" class="form-label">Pickup Location</label>
                    <input type="text" class="form-control" id="pickup_location" name="pickup_location" required>
                </div>
                <div class="mb-3">
                    <label for="dropoff_location" class="form-label">Dropoff Location</label>
                    <input type="text" class="form-control" id="dropoff_location" name="dropoff_location" required>
                </div>
                <div class="mb-3">
                    <label for="vehicle_id" class="form-label">Select Vehicle</label>
                    <select class="form-control" id="vehicle_id" name="vehicle_id">
                        <option value="">No Vehicle</option>
                        @foreach ($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}">{{ $vehicle->license_plate }} - {{ $vehicle->type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Book Ride</button>
            </div>
        </div>
    </form>
  </div>
</div>
@endsection