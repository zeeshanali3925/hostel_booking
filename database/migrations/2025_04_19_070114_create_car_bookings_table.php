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
        Schema::create('car_bookings', function (Blueprint $table) {
          

            $table->id();
            $table->string('car_name');
            $table->string('brand');
            $table->integer('seats');
            $table->string('fuel');
            $table->integer('model_year');
            $table->integer('price_per_day');
            $table->string('from_city');
            $table->string('to_city');
            $table->date('booking_date');
            $table->date('return_date');
            $table->integer('estimated_rent');
            $table->integer('total_days');
            $table->integer('total_price');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_bookings');
    }
};
