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
        Schema::dropIfExists('admin_pass_numbers');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('admin_pass_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('pass_number')->unique();
            $table->timestamps();
        });
    }
};