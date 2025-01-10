<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'license_plate',
        'type',
        'capacity',
    ];

    /**
     * Define the relationship with the Ride model
     */
    public function rides()
    {
        return $this->hasMany(Ride::class); // A vehicle has many rides
    }
}
