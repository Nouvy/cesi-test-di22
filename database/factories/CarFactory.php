<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'marque' => fake()->company(),
            'modele' => Str::random(50),
            'immat' => Str::random(7),
            'num_serie' => Str::random(35),
            'puissance_fiscale' => fake()->randomDigit(),
            'date_mise_circulation' => fake()->date()
        ];
    }
}
