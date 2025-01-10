<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    // Optional: if you want to specify the table name (if it's different from the default)
    protected $table = 'rides'; // You can remove this line if you are using the default table name

    // Allow mass assignment on these columns
    protected $fillable = [
        'user_id',
        'vehicle_id',
        'pickup_location',
        'dropoff_location',
        'status',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class); // A ride belongs to a user
    }

    // Define the relationship with the Vehicle model
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class); // A ride belongs to a vehicle
    }
}
