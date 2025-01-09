
@extends('layouts.app')

@section('content')
<style>
    .content {
        background: url('/path/to/your/background-image.jpg') no-repeat center center fixed;
        background-size: cover;
        color: #fff;
        padding: 50px;
        text-align: center;
    }
    .intro {
        font-size: 1.2em;
        margin-bottom: 20px;
    }
    .link-buttons a {
        margin: 10px;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }
    .link-buttons a:hover {
        background-color: #0056b3;
    }
    footer {
        margin-top: 50px;
        font-size: 0.9em;
    }
</style>

<div class="content">
    <header>
        <h1>Welcome to the Ride Booking System</h1>
    </header>

    <div class="content">
        <p class="intro">
            The Ride Booking System is designed to make booking rides easy, efficient, and user-friendly. Whether you need a ride to work, to a party, or for any other occasion, we are here to provide you with the best experience. Our system allows you to book rides seamlessly, track your booking, and enjoy a smooth journey with our trusted drivers. Join us today and enjoy the convenience of booking your rides anytime, anywhere!
        </p>
        
        <!-- Link buttons for ride and vehicle pages -->
        <div class="link-buttons">
            <a href="{{ route('rides.index') }}" class="btn btn-primary">Book a Ride</a>
            <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">View Vehicles</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Ride Booking System. All rights reserved.</p>
    </footer>
</div>
@endsection