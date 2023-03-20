<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applications>
 */
class ApplicationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pet_name' => fake()->name(),
            'photo_url' => $this->faker->loremflickr('applications', 640, 480, 'animal'),
            'status' => ['new', 'processing', 'processed'][rand(0, 2)],
            'user_id' => 1,
        ];
    }
}
