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
        Schema::create('flight_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('flight_name');
            $table->string('trip_type');
            $table->date('departure_date');
            $table->date('return_date')->nullable();
            $table->unsignedInteger('adults');
            $table->unsignedInteger('children');
            $table->unsignedInteger('infants');
            $table->string('travel_class');
            $table->text('special_request')->nullable();
            $table->boolean('agree')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_bookings');
    }
};
