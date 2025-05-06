<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cruise;

class CruiseSeeder extends Seeder
{
    public function run()
    {
        Cruise::insert([
            [
                'title' => 'Caribbean Dream Cruise',
                'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e',
                'desc' => '7 nights luxury cruise with ocean views, fine dining, and fun activities.',
                'price' => 799,
                'rating' => 4.5,
                'badge' => 'Popular'
            ],
            [
                'title' => 'Mediterranean Explorer',
                'image' => 'https://images.unsplash.com/photo-1533777857889-4be7c70b33f7',
                'desc' => 'Explore Europe via sea with historic cities and breathtaking coastlines.',
                'price' => 999,
                'rating' => 4.8,
                'badge' => 'New'
            ],
            [
                'title' => 'Alaskan Adventure',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSara6Xi8YA5sP4JMoh3dTWIUlvSCKOW7hHVw&s',
                'desc' => 'Enjoy nature, glaciers, and wildlife in this 5-night Alaskan cruise trip.',
                'price' => 699,
                'rating' => 4.6,
                'badge' => 'Top Rated'
            ]
        ]);
    }
}
