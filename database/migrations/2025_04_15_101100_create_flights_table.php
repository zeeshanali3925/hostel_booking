<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_flights_table.php
public function up()
{
    Schema::create('flights', function (Blueprint $table) {
        $table->id();
        $table->string('airline_name');
        $table->string('flight_number');
        $table->string('from');
        $table->string('to');
        $table->date('departure_date');
        $table->time('departure_time');
        $table->decimal('price', 8, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
