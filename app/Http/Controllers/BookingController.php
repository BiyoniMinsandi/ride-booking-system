<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function show(Request $request)
    {
        // Assuming you need to pass some data to the view
        $data = []; // Replace with actual data fetching logic

        return view('booking', $data);
    }
}
