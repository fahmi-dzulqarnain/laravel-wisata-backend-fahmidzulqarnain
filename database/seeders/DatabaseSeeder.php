<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Fahmi Dzulqarnain',
            'email' => 'fdz.fhz1302@gmail.com',
            'password' => Hash::make('Bismillah**'),
        ]);

        Category::factory(2)->create();

        Product::factory(13)->create();
    }
}
