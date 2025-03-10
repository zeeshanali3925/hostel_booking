<?php

namespace Database\Seeders;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=10;$i++){
            Article::create([
                'title'=>'Article'.$i,
                'content'=>Str::random(10),
            ]);
        }
    }
}
