<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ride>
 */
class RideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           
                'user_id' => \App\Models\User::factory(),
                'vehicle_id' => \App\Models\Vehicle::factory(),
                'pickup_location' => $this->faker->address(),
                'dropoff_location' => $this->faker->address(),
                'status' => $this->faker->randomElement(['pending', 'approved', 'completed']),
            ];
        
    }
}
