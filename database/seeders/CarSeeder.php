<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Image;
use Database\Factories\ImageFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::factory()->count(25)->create()->each(function ($car) {
            $car->images()->saveMany(
                Image::factory(['imageable_id' => $car->id])->count(rand(2, 6))->create()
            );
        });
    }
}
