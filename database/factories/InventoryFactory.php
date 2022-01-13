<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'survivor_id' => $this->faker->unique()->numberBetween(4, 6),
            'item_id' => $this->faker->numberBetween(1, 4),
            'quantity' => $this->faker->numberBetween(1, 2)
        ];
    }
}
