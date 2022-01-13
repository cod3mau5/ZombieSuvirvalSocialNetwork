<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SuvirvorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'age'=> $this->faker->numberBetween(1, 120),
            'gender'=> $this->faker->randomElement(['male','female']),
            'latitude'=> $this->faker->numberBetween(1, 9999),
            'longitude'=> $this->faker->numberBetween(1, 9999),
            'infected'=>false,
            'points'=>0
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
