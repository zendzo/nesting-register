<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Drawing>
 */
class DrawingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'project_id' => rand(1, 10),
          'drawing_number' => $this->faker->randomNumber(5),
          'drawing_title' => $this->faker->sentences(2, true),
          'status' => $this->faker->randomElement([
              'Issued For Review',
              'Issued For Approval',
              'Issued For Information',
              'Approved For Construction',
          ]),
          'remarks' => $this->faker->sentences(3, true),
        ];
    }
}
