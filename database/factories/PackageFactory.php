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
            'duration' => $this->faker->numberBetween(1,10),
            'payout_mode' => $this->faker->randomElement(['single', 'monthly', 'quarterly', 'semi-annually', 'biannually', 'annually', 'custom']),
            "duration_mode" => $this->faker->randomElement(['day', 'month', 'year']),
            'roi' => $this->faker->numberBetween(10, 100),
            'type' => $this->faker->randomElement(['plant', 'farm']),

            'start_date' => $this->faker->date('Y-m-d H:i:s'),
            'slots' => $this->faker->numberBetween(1000, 5000),
        ];
    }
}
