<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SurvivorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $items= [
            4=>'Water',
            3=>'Food',
            2=>'Medication',
            1=>'Ammunition'
        ];
        $totalPoints=0;
        foreach($items as $key=>$item){
            $totalPoints=$totalPoints + $key;
        }
        return [
            'name' => $this->faker->name(),
            'age'=> $this->faker->numberBetween(1, 120),
            'gender'=> $this->faker->randomElement(['Male','Female']),
            'latitude'=> $this->faker->randomFloat(),
            'longitude'=> $this->faker->randomFloat(),
            'infected'=>false,
            'points'=>$totalPoints
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
