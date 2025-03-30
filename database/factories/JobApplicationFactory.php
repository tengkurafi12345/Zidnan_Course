<?php

namespace Database\Factories;

use App\Models\JobApplicant;
use App\Models\JobApplication;
use App\Models\JobQualification;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobApplicationFactory extends Factory
{
    protected $model = JobApplication::class;

    public function definition(): array
    {
        return [
            'job_vacancy_id' => \App\Models\JobVacancy::factory(),
            'job_applicant_id' => \App\Models\JobApplicant::factory(),
            'resume_url' => fake()->url(),
            'cover_letter' => fake()->paragraph(),
            'status' => fake()->randomElement(['pending', 'reviewed', 'interview', 'rejected', 'hired']),
            'applied_at' => fake()->dateTime(),
        ];
    }
}
