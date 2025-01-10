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

        /* Ensuring the Edit and Delete buttons have the same size */
        .btn-actions {
            min-width: 90px;  
        }

        /* Table row hover effect */
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;  
        }

        /* Style for the "Rides" heading */
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
            <h1 class="header-title">Rides</h1>
            <a href="{{ route('rides.create') }}" class="btn btn-purple">Create New Ride</a>
        </div>
        
        @if($rides->isEmpty())
            <div class="alert alert-info" role="alert">
                No rides available. Please create a new ride.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-custom">
                        <tr>
                            <th>ID</th>
                            <th>Pickup Location</th>
                            <th>Dropoff Location</th>
                            <th>Status</th>
                            <th>Vehicle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rides as $ride)
                            <tr>
                                <td>{{ $ride->id }}</td>
                                <td>{{ $ride->pickup_location }}</td>
                                <td>{{ $ride->dropoff_location }}</td>
                                <td>
                                    <span class="badge 
                                        @if($ride->status == 'Pending') badge-warning 
                                        @elseif($ride->status == 'In Progress') badge-info 
                                        @elseif($ride->status == 'Completed') badge-success 
                                        @endif">
                                        {{ $ride->status }}
                                    </span>
                                </td>
                                <td>{{ $ride->vehicle ? $ride->vehicle->type : 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('rides.edit', $ride->id) }}" class="btn btn-warning btn-sm btn-actions">Edit</a>
                                    <form action="{{ route('rides.destroy', $ride->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-actions" onclick="return confirm('Are you sure you want to delete this ride?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $rides->links() }} <!-- Display pagination links -->
            </div>
        @endif
    </div>
@endsection
