<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'Test', // ✅ Change name to first_name
            'last_name' => 'User',  // ✅ Add last_name
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
