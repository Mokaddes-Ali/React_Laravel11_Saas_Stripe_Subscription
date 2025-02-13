<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Package;
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


        User::create([
            'name' => 'Mokaddes Ali',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        Package::create([
            'name' => 'Package 1',
            'price' => 100,
            'credits' => 100,
        ]);

        Package::create([
            'name' => 'Package 2',
            'price' => 200,
            'credits' => 200,
        ]);

        Package::create([
            'name' => 'Package 3',
            'price' => 300,
            'credits' => 300,
        ]);

        Feature::create([
            'image' => 'https://cdn.vectorstock.com/i/1000x1000/38/64/color-circle-with-plus-icon-vector-13503864.webp',
            'route_name' => 'feature1.index',
            'name' => 'Feature 1',
            'description' => 'Description of Feature 1',
            'required_credits' => 10,
            'active' => true,
        ]);

        Feature::create([
            'image' => 'https://cdn.vectorstock.com/i/1000x1000/38/64/color-circle-with-plus-icon-vector-13503864.webp',
            'route_name' => 'feature2.index',
            'name' => 'Feature 2',
            'description' => 'Description of Feature 2',
            'required_credits' => 5,
            'active' => true,
        ]);

    }
}
