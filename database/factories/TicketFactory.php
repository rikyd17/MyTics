<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'user_id' => \App\Models\User::factory(),
        'event_id' => \App\Models\Event::factory(),
        'code' => 'TKT-' . uniqid(),
        'quantity' => $this->faker->numberBetween(1, 5),
        'status' => $this->faker->randomElement(['pending', 'success', 'failed']),
        'total_price' => $this->faker->numberBetween(10000, 500000),
    ];
}
}
