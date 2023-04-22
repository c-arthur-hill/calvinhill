<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkOrder>
 */
class WorkOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'from_first_name' => fake()->firstName(),
            'from_last_name' => fake()->lastName(),
            'from_address_1' => fake()->streetAddress(),
            'from_address_2' => '',
            'from_city' => fake()->city(),
            'from_zip' => fake()->randomNumber(5),
            'from_state' => fake('en_US')->state(),
            'to_first_name' => fake()->firstName(),
            'to_last_name' => fake()->lastName(),
            'to_address_1' => fake()->streetAddress(),
            'to_address_2' => '',
            'to_city' => fake()->city(),
            'to_zip' => fake()->randomNumber(5),
            'to_state' => fake('en_US')->state(),
        ];
    }
}
