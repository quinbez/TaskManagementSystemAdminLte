<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->name(),
            'description' => fake()->sentence,
            'team_member' => fake()->randomDigit,
            'start_date' => now(),
            'deadline' => \Carbon\Carbon::now()->addMonth(),
            'status' => 'pending'
        ];
    }
}
