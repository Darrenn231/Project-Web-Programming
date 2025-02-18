<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'item_image' => $this->faker->image(),
            'item_name' => $this->faker->name(),
            'item_category' => $this->faker->randomElement(['Main Course', 'Beverage', 'Desserts']),
            'item_price' =>  $this->faker->randomNumber(),
            'bdesc'=>$this->faker->text(10),
            'desc' => $this->faker->text(30),
        ];
    }
}
