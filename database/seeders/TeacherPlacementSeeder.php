<?php

namespace Database\Seeders;

use App\Models\AcademicPeriod;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\PacketCombination;
use App\Models\TeacherPlacement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TeacherPlacementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $teachers = Teacher::all();
        $students = Student::all();
        $packetCombinations = PacketCombination::all();
        $academicPeriod = AcademicPeriod::first();

        if ($teachers->isEmpty() || $students->isEmpty() || $packetCombinations->isEmpty()) {
            $this->command->warn('TeacherPlacementSeeder skipped: required data is missing.');
            return;
        }

        $data = [];

        foreach ($students as $student) {

            // Ambil 1 packet combination (contoh: random)
            $packet = $packetCombinations->random();

            // Ambil 1 teacher (contoh: random)
            $teacher = $teachers->random();

            // Hindari duplikasi penempatan
            $exists = TeacherPlacement::where('teacher_id', $teacher->id)
                ->where('student_id', $student->id)
                ->where('packet_combination_id', $packet->id)
                ->exists();

            if ($exists) {
                continue;
            }

            $data[] = [
                'id' => Str::uuid(),
                'academic_period_id' => $academicPeriod->id,
                'teacher_id' => $teacher->id,
                'student_id' => $student->id,
                'packet_combination_id' => $packet->id,
                // 'meeting_times' => json_encode([
                //     'day' => 'Monday',
                //     'start_time' => '16:00',
                //     'end_time' => '17:30',
                // ]),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        TeacherPlacement::insert($data);
    }
}
