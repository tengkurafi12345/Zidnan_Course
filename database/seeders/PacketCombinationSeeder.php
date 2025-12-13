<?php

namespace Database\Seeders;

use App\Models\LessonLevel;
use App\Models\Program;
use App\Models\PacketCombination;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PacketCombinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $lessonLevels = LessonLevel::all();
        $programs = Program::all();

        $data = [];

        foreach ($lessonLevels as $lessonLevel) {
            foreach ($programs as $program) {

                // (Opsional) Hindari duplikasi
                $exists = PacketCombination::where('lesson_level_id', $lessonLevel->id)
                    ->where('program_id', $program->id)
                    ->exists();

                if ($exists) {
                    continue;
                }

                $data[] = [
                    'id' => Str::uuid(),
                    'lesson_level_id' => $lessonLevel->id,
                    'program_id' => $program->id,
                    'price' => $this->generatePrice($lessonLevel, $program),
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        PacketCombination::insert($data);
    }

    /**
     * Contoh logika harga (silakan sesuaikan)
     */
    private function generatePrice($lessonLevel, $program): float
    {
        $basePrice = 100000;

        if (str_contains($lessonLevel->class_level, 'SMA')) {
            $basePrice += 50000;
        }

        if (str_contains($lessonLevel->class_level, 'Mahasiswa')) {
            $basePrice += 100000;
        }

        return $basePrice;
    }
}
