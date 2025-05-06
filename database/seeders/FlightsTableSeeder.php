<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   // database/seeders/FlightsTableSeeder.php
public function run()
{
    \App\Models\Flight::create([
        'airline_name' => 'Air Zeeshan',
        'flight_number' => 'AZ101',
        'from' => 'Lahore',
        'to' => 'Karachi',
        'departure_date' => '2025-05-01',
        'departure_time' => '10:00:00',
        'price' => 15000,
    ]);
}

}
