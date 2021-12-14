<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PurokFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Purok ' . $this->faker->numberBetween(1, 1000),
        ];
    }
}
