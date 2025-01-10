@extends('layouts.app')

@section('content')
    <style>
       
        .btn-purple {
            background-color: #6f42c1;  
            color: white;
            width: 200px;
            font-size: 16px;
        }
        .btn-purple:hover {
            background-color: #5a2e8d; 
            color: white;
        }

        /* Input fields and form styling */
        .form-group label {
            font-weight: bold;
            font-size: 16px;
        }

        .form-control {
            font-size: 14px;
            padding: 12px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #6f42c1;
            box-shadow: 0 0 5px rgba(111, 66, 193, 0.5);
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        .header-title {
            font-weight: 900; 
            font-size: 42px; 
            color: #6f42c1; 
            text-transform: uppercase; 
            letter-spacing: 4px; 
            text-align: center; 
            margin-bottom: 30px; 
        }

        /* Flexbox for spacing between buttons */
        .btn-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;  
        }
    </style>

    <div class="container mt-5">
        <h1 class="header-title">Add New Vehicle</h1> <!-- Updated header class -->
        <form method="POST" action="{{ route('vehicles.store') }}">
            @csrf

            <!-- License Plate -->
            <div class="form-group mb-3">
                <label for="license_plate" class="form-label text-purple fw-bold">License Plate</label>
                <input type="text" name="license_plate" id="license_plate" class="form-control" placeholder="Enter license plate" required>
                @error('license_plate')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <!-- Type -->
            <div class="form-group mb-3">
                <label for="type" class="form-label text-purple fw-bold">Type</label>
                <input type="text" name="type" id="type" class="form-control" placeholder="Enter vehicle type" required>
                @error('type')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <!-- Capacity -->
            <div class="form-group mb-3">
                <label for="capacity" class="form-label text-purple fw-bold">Capacity</label>
                <input type="number" name="capacity" id="capacity" class="form-control" placeholder="Enter capacity" required>
                @error('capacity')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="btn-group">
                <button type="submit" class="btn btn-purple">Add Vehicle</button>
                <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Back to Vehicles</a>
            </div>
        </form>
    </div>
@endsection
