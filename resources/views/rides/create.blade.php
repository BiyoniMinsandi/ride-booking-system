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

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input, .form-group select {
            width: 100%;
            border-radius: 8px;
            padding: 10px;
        }

        /* Styling for the select box */
        select.form-control {
            height: 45px; 
            font-size: 16px; 
        }

        /* Button group style */
        .btn-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        /* Styling for "Create New Ride" heading */
        .header-title {
            font-weight: 900;
            font-size: 42px; 
            color: #6f42c1; 
            text-transform: uppercase; 
            letter-spacing: 4px; 
            text-align: center; 
            margin-bottom: 30px; 
        }
    </style>

    <div class="container mt-5">
        <h1 class="header-title">Create New Ride</h1> <!-- Updated header class -->
        <form action="{{ route('rides.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="pickup_location">Pickup Location</label>
                <input type="text" name="pickup_location" id="pickup_location" class="form-control" placeholder="Enter pickup location" required>
            </div>
            <div class="form-group">
                <label for="dropoff_location">Dropoff Location</label>
                <input type="text" name="dropoff_location" id="dropoff_location" class="form-control" placeholder="Enter dropoff location" required>
            </div>
            <div class="form-group">
                <label for="vehicle_id">Vehicle</label>
                <select name="vehicle_id" id="vehicle_id" class="form-control" required>
                    <option value="">Select a vehicle</option>
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}">{{ $vehicle->type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-purple">Create Ride</button>
                <a href="{{ route('rides.index') }}" class="btn btn-secondary">Back to Rides</a>
            </div>
        </form>
    </div>

    <!-- Location Picker Integration (Google Maps API) -->
    <script>
        // Initialize Google Places Autocomplete for location fields
        function initAutocomplete() {
            const pickupInput = document.getElementById('pickup_location');
            const dropoffInput = document.getElementById('dropoff_location');
            
            const options = {
                componentRestrictions: { country: "lk" }, 
                fields: ["address_components", "geometry", "formatted_address"],
                types: ["geocode"]
            };

            // Initialize Autocomplete
            const pickupAutocomplete = new google.maps.places.Autocomplete(pickupInput, options);
            const dropoffAutocomplete = new google.maps.places.Autocomplete(dropoffInput, options);

            // Add event listeners (Optional: You can handle address changes here if needed)
            pickupAutocomplete.addListener('place_changed', function() {
                const place = pickupAutocomplete.getPlace();
                console.log(place);
            });

            dropoffAutocomplete.addListener('place_changed', function() {
                const place = dropoffAutocomplete.getPlace();
                console.log(place);
            });
        }

        // Load Google Maps API script with Places Library
        function loadGoogleMapsAPI() {
            const script = document.createElement('script');
            script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAil8zej6X327OJUKGvRO-pylbVr85esuY&libraries=places&callback=initAutocomplete";
            script.async = true;
            script.defer = true;
            script.onerror = function() {
                console.error("Failed to load Google Maps API");
            };
            document.head.appendChild(script);
        }

        loadGoogleMapsAPI();
    </script>
@endsection
