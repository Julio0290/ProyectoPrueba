<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->firstName($gender='male')." ".fake()->lastName,
            'edad' => fake()->numberBetween(1, 100),
             'genero' => $this->faker->randomElement(['F', 'M']),


        ];
    }
}
