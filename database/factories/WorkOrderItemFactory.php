<?php

namespace Database\Factories;

use App\Models\WorkOrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkOrderItem>
 */
class WorkOrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'workflow_state' => WorkOrderItem::READY_TO_SHIP
        ];
    }
}
