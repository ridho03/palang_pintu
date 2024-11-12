<?php

namespace Database\Factories;

use App\Models\VehicleOwner;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registrationNumber'=>VehicleOwner::inRandomOrder()->first()->id,
            'make'=>fake()->word(),
            'model'=>fake()->word(),
            'year' => fake()->numberBetween(3000, 4000),
            
            //
        ];
    }
}
