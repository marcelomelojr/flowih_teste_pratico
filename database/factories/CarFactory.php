<?php

namespace Database\Factories;

use App\Models\User;
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
        $user = User::inRandomOrder()->first();
        return [
            'name' => $this->faker->name,
            'model' => $this->faker->company,
            'color' => $this->faker->colorName,
            'year' => $this->faker->year,
            'price' => $this->faker->randomFloat(2, 0, 100000),
            'description' => $this->faker->text(2000),
            'user_id' => $user->id,
        ];
    }
}
