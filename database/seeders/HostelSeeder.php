<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HostelSeeder extends Seeder
{
    public function run()
    {
        DB::table('hostels')->insert([
            [
                'name' => 'Green Valley Hostel',
                'city' => 'Lahore',
                'description' => 'A comfortable hostel in the heart of Lahore with modern amenities.',
            ],
            [
                'name' => 'Sunrise Inn',
                'city' => 'Karachi',
                'description' => 'Affordable hostel with sea view and friendly environment.',
            ],
            [
                'name' => 'Elite Residency',
                'city' => 'Islamabad',
                'description' => 'Luxury hostel with all facilities in Islamabad.',
            ],
        ]);
    }
}
