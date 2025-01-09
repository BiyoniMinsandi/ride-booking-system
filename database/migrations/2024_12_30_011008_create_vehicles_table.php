<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id(); // Creates the primary key column 'id' which auto increments
            $table->string('license_plate')->unique(); // Unique license plate for each vehicle
            $table->string('type'); // Type of the vehicle (e.g., car, truck, etc.)
            $table->integer('capacity'); // Capacity of the vehicle
            $table->timestamps(); // Created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
