<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->jobTitle(),
            'employer_id' => Employer::factory(),
            'salary' => '$50,000 USD'
            // 'experienced' => false //using field which is generally not manipulated either in the special case
        ];
    }

    // public function expereinced(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'experienced' => true,
    //     ]);
    // } // to create job with experience column true we can do it by aclling this App\Models\Job:factory()->experienced()->create()
}
