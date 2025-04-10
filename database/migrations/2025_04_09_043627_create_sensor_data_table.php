<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->decimal('temperature', 5, 2);  // Temperature with precision 5 and scale 2
            $table->decimal('humidity', 5, 2);     // Humidity with precision 5 and scale 2
            $table->timestamps();  // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_data');  // Drop the 'sensor_data' table
    }
};
