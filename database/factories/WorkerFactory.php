<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'         => [
                'first'  => strtoupper($this->faker->firstName()),
                'middle' => strtoupper($this->faker->lastName()),
                'last'   => strtoupper($this->faker->lastName()),
                'suffix' => $this->faker->randomElement(['JR', 'SR', 'II', 'III', 'IV', null, null, null, null]),
            ],
            'birthdate'    => $this->faker->date(),
        ];
    }
}
