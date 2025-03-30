<?php

namespace Database\Factories;

use App\Models\JobVacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<JobVacancy>
 */
class JobVacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'location' => fake()->city(),
            'employment_type' => fake()->randomElement(['Full Time', 'Part Time', 'Contract']),
            'job_type' => fake()->word(),
            'salary_min' => fake()->numberBetween(5000000, 10000000),
            'salary_max' => fake()->numberBetween(11000000, 20000000),
            'currency' => 'IDR',
            'job_description' => fake()->paragraph(),
            'date_line' => fake()->date(),
            'published_at' => fake()->dateTime(),
        ];
    }
}
