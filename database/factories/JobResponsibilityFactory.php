<?php

namespace Database\Factories;

use App\Models\JobResponsibility;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobResponsibilityFactory extends Factory
{
    protected $model = JobResponsibility::class;

    public function definition(): array
    {
        return [
            'job_vacancy_id' => \App\Models\JobVacancy::factory(),
            'description' => $this->faker->sentence(),
            'items' => [
                'Dolor justo tempor duo ipsum accusam',
                'Elitr stet dolor vero clita labore gubergren',
                'Rebum vero dolores dolores elitr',
                'Est voluptua et sanctus at sanctus erat',
                'Diam diam stet erat no est est'
            ],
        ];
    }
}
