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
            'name' => 'Tomato',
            'image' => 'image/111.jpg',
            'mass' => '100',
            'price' => '3',
        ]);

        products::create([
            'name' => 'Potato',
            'image' => 'image/222.jpeg',
            'mass' => '100',
            'price' => '2',
        ]);

        products::create([
            'name' => 'Cucumber',
            'image' => 'image/333.png',
            'mass' => '100',
            'price' => '4',
        ]);

        products::create([
            'name' => 'Carbage',
            'image' => 'image/666.jpg',
            'mass' => '100',
            'price' => '5',
        ]);
    }
}
