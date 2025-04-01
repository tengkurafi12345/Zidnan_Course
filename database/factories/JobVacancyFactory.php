<?php

namespace Database\Factories;

use App\Enums\JobCategory;
use App\Enums\JobType;
use App\Enums\WorkPolicy;
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
            'job_type' => fake()->randomElement(JobType::values()),
            'category' => fake()->randomElement(JobCategory::values()),
            'work_policy' => fake()->randomElement(WorkPolicy::values()),
            'salary_min' => fake()->numberBetween(5000000, 10000000),
            'salary_max' => fake()->numberBetween(11000000, 20000000),
            'job_description' => fake()->paragraph(),
            'date_line' => fake()->date(),
            'published_at' => fake()->dateTime(),
        ];
    }
}
