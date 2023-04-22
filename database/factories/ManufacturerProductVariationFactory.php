<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\ManufacturerProduct;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ManufacturerProductVariation>
 */
class ManufacturerProductVariationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'color_id' => Color::factory(),
        ];
    }
}
