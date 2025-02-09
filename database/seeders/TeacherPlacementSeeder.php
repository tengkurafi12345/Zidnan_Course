<?php

namespace Database\Seeders;

use App\Models\TeacherPlacement;
use Illuminate\Database\Seeder;

class TeacherPlacementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeacherPlacement::factory()->count(10)->create(); // Membuat 10 teacher
    }
}
