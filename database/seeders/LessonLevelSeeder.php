<?php

namespace Database\Seeders;

use App\Models\LessonLevel;
use Illuminate\Database\Seeder;

class LessonLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LessonLevel::factory()->count(10)->create();
    }
}
