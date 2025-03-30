<?php

namespace Database\Factories;

use App\Models\JobApplicant;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobApplicantFactory extends Factory
{
    protected $model = JobApplicant::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
        ];
    }
}
