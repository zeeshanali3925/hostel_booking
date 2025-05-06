<?php

namespace Database\Seeders;
use Database\Seeders\StaySeeder;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
{
    // Clear the users table before inserting new data
    User::truncate(); 

    // Insert default user
    User::create([
        'first_name' => 'Test',
        'last_name' => 'User',
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    // Seed other tables
    $this->call(StaySeeder::class);
}

}

