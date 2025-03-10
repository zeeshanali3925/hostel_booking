<?php

namespace Database\Seeders;
use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       for($i=1;$i<=10;$i++){
        Image::create([
        'image_path' => 'https://sojournies.com/wp-content/uploads/2019/04/Budget-hostel-in-Tulum-1.jpg' . $i,
            'caption'=>'image Caption'.$i,
        ]);
       }

    }
}
