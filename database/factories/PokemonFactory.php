<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pokemon>
 */
class PokemonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'species' => $this->faker->sentence(),
            'primary_type' => $this->faker->randomElement(['Grass', 'Fire', 'Water', 'Electric', 'Dragon', 'Fighting']),
            'weight' => $this->faker->randomFloat(2, 9000, 45000),
            'height' => $this->faker->randomFloat(2, 9000, 45000),

            'hp' => $this->faker->numberBetween(10, 100),
            'attack' => $this->faker->numberBetween(10, 1000),
            'defense' => $this->faker->numberBetween(10, 1000),
            'is_legendary' => $this->faker->boolean(),
            


        ];
    }
}
