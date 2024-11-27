<?php

namespace Database\Seeders;

use App\Models\CategoryCourse;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryCourse::factory()->count(5)->create(); // Membuat 5 kategori course
    }
}
