<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Assuming you need to pass some data to the view
        $data = []; // Replace with actual data fetching logic

        return view('home', $data);
    }
}
