@extends('layouts.app')

@section('content')
    <style>
        
        .btn-purple {
            background-color: #6f42c1;  
            color: white;
        }
        .btn-purple:hover {
            background-color: #5a2e8d; 
            color: white;
        }

        
        .thead-custom {
            background-color: #6f42c1;  
            color: white;
        }

        
        .btn-actions {
            min-width: 90px;  
        }

        /* Table row hover effect */
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;  
        }

        /* Style for the "Vehicles" heading */
        .header-title {
            font-weight: bold; 
            font-size: 36px; 
            color: #6f42c1; 
            text-transform: uppercase; 
            letter-spacing: 2px; 
        }
    </style>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="header-title">Vehicles</h1>
            <a href="{{ route('vehicles.create') }}" class="btn btn-purple">Add New Vehicle</a>
        </div>
        
        @if($vehicles->isEmpty())
            <div class="alert alert-info" role="alert">
                No vehicles available. Please add a new vehicle.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-custom">
                        <tr>
                            <th>ID</th>
                            <th>License Plate</th>
                            <th>Type</th>
                            <th>Capacity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vehicles as $vehicle)
                            <tr>
                                <td>{{ $vehicle->id }}</td>
                                <td>{{ $vehicle->license_plate }}</td>
                                <td>{{ $vehicle->type }}</td>
                                <td>{{ $vehicle->capacity }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-warning btn-sm btn-actions">Edit</a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-actions" onclick="return confirm('Are you sure you want to delete this vehicle?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $vehicles->links() }} <!-- Display pagination links -->
            </div>
        @endif
    </div>
@endsection
