<?php

namespace Database\Seeders;

use App\Models\JobResponsibility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\JobVacancy::factory(5)->create();
        \App\Models\JobResponsibility::factory(5)->create();
        \App\Models\JobQualification::factory(5)->create();
        \App\Models\JobApplicant::factory(5)->create();
        \App\Models\JobApplication::factory(5)->create();
    }
}
