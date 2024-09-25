<?php

namespace Database\Seeders;

use App\Models\products;
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
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        products::create([
            'p_name' => 'Tomato',
            'p_image' => 'image/111.jpg',
            'p_mass' => '100',
            'p_price' => '3',
        ]);

        products::create([
            'p_name' => 'Potato',
            'p_image' => 'image/222.jpeg',
            'p_mass' => '100',
            'p_price' => '2',
        ]);

        products::create([
            'p_name' => 'Cucumber',
            'p_image' => 'image/333.png',
            'p_mass' => '100',
            'p_price' => '4',
        ]);

        products::create([
            'p_name' => 'Carbage',
            'p_image' => 'image/666.jpg',
            'p_mass' => '100',
            'p_price' => '5',
        ]);
    }
}
