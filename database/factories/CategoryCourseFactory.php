<?php

namespace Database\Factories;

use App\Models\CategoryCourse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryCourse>
 */
class CategoryCourseFactory extends Factory
{
    protected $model = CategoryCourse::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'order' => $this->faker->numberBetween(1, 10),
            'is_active' => $this->faker->boolean(), // 80% active
        ];
    }
}
