<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ride;
use App\Models\Vehicle;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
       Vehicle::factory(5)->create();
       Ride::factory(20)->create();

        
    }
}
