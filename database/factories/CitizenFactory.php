<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CitizenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'household_id' => $this->faker->numberBetween(1, 10),
            'name'         => [
                'first'  => strtoupper($this->faker->firstName()),
                'middle' => strtoupper($this->faker->lastName()),
                'last'   => strtoupper($this->faker->lastName()),
                'suffix' => $this->faker->randomElement(['JR', 'SR', 'II', 'III', 'IV', null, null, null, null]),
            ],
            'birthdate'    => $this->faker->date(),
            'philhealth'   => $this->faker->randomNumber(8),
            'sex'          => $this->faker->randomElement(['MALE', 'FEMALE']),
            '4ps'          => $this->faker->boolean(30),
        ];
    }
}
