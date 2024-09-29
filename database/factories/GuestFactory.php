<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'supper' => fake()->boolean(),
            'menu' => fake()->randomElement(['Carnivore', 'Végétarien']),
            'allergies' => fake()->optional()->text(),
            'sleep' => fake()->boolean(),
            'is_submitter' => fake()->boolean(),
            'submission_id' => \App\Models\Submission::factory(),
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime(),
            'deleted_at' => fake()->optional()->dateTime(),
        ];
    }
}
