<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            News::create([
                'headline' => "News {$i}", // ✅ اب بہتر فارمیٹنگ
                'details' => Str::random(10),
            ]);
        }
    }
}
