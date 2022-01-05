<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HouseholdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'purok_id' => $this->faker->numberBetween(1, 7),
            'number' => $this->faker->numerify('hh-###'),
            'coordinates' => $this->faker->longitude().", ".$this->faker->latitude()
        ];
    }
}
