<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'license_plate' => $this->faker->unique()->bothify('??-####'),
             'type' => $this->faker->randomElement(['Car', 'Van', 'Bike']),
             'capacity' => $this->faker->numberBetween(2, 7),
        ];
    }
}
