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
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'assigned_person' => $this->faker->unique(true)->numberBetween(1, 2),
            'emp_id' => Str::random(10),
            'division' => $this->faker->name,
            'department' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'phone' => "0171860255",
            'ticket_type' => $this->faker->numberBetween($min = 0, $max = 3),
            'error_type' => $this->faker->numberBetween($min = 1, $max = 4),
            'message' => $this->faker->sentence,
            'action_taken' => $this->faker->sentence,
            // 'status' => $this->faker->numberBetween($min = 0, $max = 2),s
        ];
    }
}
