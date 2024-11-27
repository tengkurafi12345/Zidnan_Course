<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\CategoryCourse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->regexify('[A-Z0-9]{8}'),
            'name' => $this->faker->sentence(3),
            'price' => $this->faker->numberBetween(100000, 500000),
            'description' => $this->faker->paragraph,
            'estimate_time' => $this->faker->dateTimeBetween('now', '+1 year'),
            'teacher_id' => Teacher::factory(), // Relasi dengan Teacher
            'category_id' => CategoryCourse::factory(), // Relasi dengan CategoryCourse
            'is_active' => $this->faker->boolean(90), // 90% active
        ];
    }
}
