<?php

namespace Database\Factories;

use App\Models\PacketCombination;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeacherPlacement>
 */
class TeacherPlacementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teacher_id' => Teacher::factory(),
            'student_id' => Student::factory(),
            'packet_combination_id' => PacketCombination::factory(),
        ];
    }
}
