<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'abbr' => $this->faker->unique()->word(),
            'name' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'logo' => $this->faker->imageUrl(640, 480, 'business'),
            'website' => $this->faker->url(),
        ];
    }
}
