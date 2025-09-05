<?php

namespace Database\Factories;

use App\Models\LessonLevel;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PacketCombination>
 */
class PacketCombinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lesson_level_id' => LessonLevel::factory(),
            'program_id' => Program::factory(),
            'price' => $this->faker->randomFloat(2, 100),
        ];
    }
}
