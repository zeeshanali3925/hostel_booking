<?php

namespace Database\Seeders; // ← Yeh line zaroori hai

use App\Models\travelstays;
use Illuminate\Database\Seeder;
use App\Models\Stay;

class StaySeeder extends Seeder
{
    public function run()
    {
        $stays = [
            [
                'title' => 'Luxury Beachfront Stay',
                'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c',
                'location' => 'Malibu, California',
                'price' => 250,
                'rating' => 4.9,
                'badge' => 'Top Pick'
            ],
            [
                'title' => 'Urban City Apartment',
                'image' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2',
                'location' => 'New York, USA',
                'price' => 180,
                'rating' => 4.6,
                'badge' => 'Verified'
            ],
            [
                'title' => 'Cozy Mountain Cabin',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXcvCDVlKq-30gvz8UQ85XYSdXG-OhOmc2bw&s',
                'location' => 'Aspen, Colorado',
                'price' => 200,
                'rating' => 4.8,
                'badge' => 'Popular'
            ],
        ];

        foreach ($stays as $stay) {
            Stay::create($stay);

        }
    }
}
