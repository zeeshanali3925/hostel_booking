<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Package;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $packages = [
            [
                'title' => 'Dubai Explorer',
                'price' => '$999',
                'desc' => '5 nights, 4-star hotel, desert safari, Burj Khalifa visit, shopping tour included.',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlxXMqxSJfg_6XeJicH2DWs8riqwcg0wjd1w&s'
            ],
            [
                'title' => 'Maldives Honeymoon',
                'price' => '$1599',
                'desc' => '4 nights overwater villa, breakfast included, romantic dinner, island hopping.',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScu5lFh7XXY9NGrvKhJJUrsV06W8X66ttm2g&s'
            ],
            [
                'title' => 'Turkey Delight',
                'price' => '$1199',
                'desc' => '7 nights Istanbul + Cappadocia, hot air balloon ride, local tours, breakfast included.',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpu3E7TN57eQ0Grt6GOSO4-uwZbk4oplbZOg&s'
            ],
            [
                'title' => 'Bali Escape',
                'price' => '$899',
                'desc' => '6 nights beachfront resort, private pool villa, temple tour, island exploration.',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTGnCr8V4_npqPkUhRFghgqHZZyfZl9tlMaSQ&s'
            ],
            [
                'title' => 'Thailand Adventure',
                'price' => '$799',
                'desc' => '7 days in Bangkok & Phuket, Phi Phi island tour, floating market visit.',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjQWocib291cM9CVBwJYe7neNpRKa6xy-mrQ&s'
            ],
            [
                'title' => 'Europe Discovery',
                'price' => '$1899',
                'desc' => '10 days across Paris, Rome & Amsterdam. Breakfast, guided city tours included.',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUDPDntOlzGjsBKG_Niq-_zOCI72IzkYDeRA&s'
            ],
        ];


        foreach ($packages as $package) {
               Package::create($package);
        }
    }
}
