<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'profile_photo' => '1.jpg',
            'password' => bcrypt('12345678'),
            'remember_token' => null
        ]);
    }
}
