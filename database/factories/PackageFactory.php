<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ucwords($this->faker->words()),
            'roi' => $this->faker->numberBetween(10, 100),
            'start_date' => $this->faker->date('Y-m-d H:i:s'),
            'slots' => $this->faker->numberBetween(1000, 5000),
        ];
    }
}
