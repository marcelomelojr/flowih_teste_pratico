<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'model' => $this->faker->name,
            'color' => $this->faker->name,
            'year' => $this->faker->year,
            'price' => $this->faker->randomFloat(2, 0, 1000000),
            'description' => $this->faker->text(255),
        ];
    }
}
