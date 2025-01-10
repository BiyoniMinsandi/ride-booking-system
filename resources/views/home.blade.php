@extends('layouts.app')

@section('content')
<style>
    .content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        min-height: 80vh;
        padding: 50px;
        background-color: #002b5c; 
        color: #f5f5f5; 
    }
    .content .text-section {
        width: 50%;
        text-align: left;
    }
    .content .text-section h1 {
        font-size: 2.8em; 
        font-weight: 700;
        margin-bottom: 20px;
        color: #6f42c1; 
    }
    .content .text-section p {
        font-size: 1.3em;
        line-height: 1.8;
        margin-bottom: 30px;
        color: #e0e0e0; 
    }
    .content .link-buttons {
        display: flex;
        gap: 20px;
    }
    .content .link-buttons a {
        padding: 15px 30px;
        background-color: #6f42c1; 
        color: #fff;
        font-size: 1.1em;
        text-decoration: none;
        font-weight: 500;
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.2s;
    }
    .content .link-buttons a:hover {
        background-color: #5a2e8d; 
        transform: scale(1.05); 
    }
    .content .image-section {
        width: 45%;
    }
    .content .image-section img {
        width: 100%;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    footer {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 15px 0;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    body {
        margin: 0;
    }
</style>

<div class="content">
    <div class="text-section">
        <h1>Welcome to QuickRide!</h1>
        <p>QuickRide is your ultimate ride-booking solution, connecting you with reliable drivers and vehicles for a seamless travel experience. Whether you need a quick ride to work or a weekend getaway, QuickRide ensures safety, convenience, and comfort at your fingertips.</p>
        <div class="link-buttons">
            <a href="{{ route('rides.index') }}">Book a Ride</a>
            <a href="{{ route('vehicles.index') }}">View Vehicles</a>
        </div>
    </div>
    <div class="image-section">
        <img src="{{ asset('images/background.jpg') }}" alt="Car Image">
    </div>
</div>

<footer>
    <p>&copy; {{ date('Y') }} QuickRide. All rights reserved.</p>
</footer>
@endsection
