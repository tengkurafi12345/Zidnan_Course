<?php

namespace Database\Seeders;

use App\Models\LessonLevel;
use App\Models\ProgramClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LessonLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        // Ambil ID ProgramClass berdasarkan nama
        $programClassMap = ProgramClass::pluck('id', 'name');

        $data = [
            // =======================
            // LES BIMBEL
            // =======================
            [
                'program_class_id' => $programClassMap['Les Bimbel'],
                'code' => 'BMB-MHS',
                'name' => 'Bimbel Mahasiswa',
                'class_level' => 'Mahasiswa',
                'description' => 'Program bimbingan belajar untuk mahasiswa.',
                'status' => '1',
                'start_date' => '2025-09-06',
                'end_date' => '2025-09-06',
            ],
            [
                'program_class_id' => $programClassMap['Les Bimbel'],
                'code' => 'LB-A1',
                'name' => 'Les Bimbel TK A-B',
                'class_level' => 'TK A-B',
                'description' => 'Program les bimbel untuk TK A dan B.',
                'status' => '1',
                'start_date' => '2025-03-02',
                'end_date' => '2025-04-01',
            ],
            [
                'program_class_id' => $programClassMap['Les Bimbel'],
                'code' => 'LB-B1',
                'name' => 'Les Bimbel SD 1-6',
                'class_level' => 'SD 1-6',
                'description' => 'Program les bimbel untuk SD kelas 1 sampai 6.',
                'status' => '1',
                'start_date' => '2025-03-02',
                'end_date' => '2025-04-01',
            ],
            [
                'program_class_id' => $programClassMap['Les Bimbel'],
                'code' => 'LB-C1',
                'name' => 'Les Bimbel SMP 7-9',
                'class_level' => 'SMP 7-9',
                'description' => 'Program les bimbel untuk SMP kelas 7 sampai 9.',
                'status' => '1',
                'start_date' => '2025-03-02',
                'end_date' => '2025-04-01',
            ],
            [
                'program_class_id' => $programClassMap['Les Bimbel'],
                'code' => 'LB-D1',
                'name' => 'Les Bimbel SMA 10-12',
                'class_level' => 'SMA 10-12',
                'description' => 'Program les bimbel untuk SMA kelas 10 sampai 12.',
                'status' => '1',
                'start_date' => '2025-03-02',
                'end_date' => '2025-04-01',
            ],

            // =======================
            // LES PRIVATE
            // =======================
            [
                'program_class_id' => $programClassMap['Les Private'],
                'code' => 'LP-A1',
                'name' => 'Les Private TK A-B',
                'class_level' => 'TK A-B',
                'description' => 'Les private untuk siswa TK A dan B.',
                'status' => '1',
                'start_date' => '2025-03-02',
                'end_date' => '2025-04-01',
            ],
            [
                'program_class_id' => $programClassMap['Les Private'],
                'code' => 'LP-B1',
                'name' => 'Les Private SD 1-6',
                'class_level' => 'SD 1-6',
                'description' => 'Les private untuk siswa SD kelas 1 sampai 6.',
                'status' => '1',
                'start_date' => '2025-03-02',
                'end_date' => '2025-04-01',
            ],
            [
                'program_class_id' => $programClassMap['Les Private'],
                'code' => 'LP-C1',
                'name' => 'Les Private SMP 7-9',
                'class_level' => 'SMP 7-9',
                'description' => 'Les private untuk siswa SMP kelas 7 sampai 9.',
                'status' => '1',
                'start_date' => '2025-03-02',
                'end_date' => '2025-04-01',
            ],
            [
                'program_class_id' => $programClassMap['Les Private'],
                'code' => 'LP-D1',
                'name' => 'Les Private SMA 10-12',
                'class_level' => 'SMA 10-12',
                'description' => 'Les private untuk siswa SMA kelas 10 sampai 12.',
                'status' => '1',
                'start_date' => '2025-03-02',
                'end_date' => '2025-04-01',
            ],

            // =======================
            // SANTRI WEEKEND
            // =======================
            [
                'program_class_id' => $programClassMap['Santri weekend'],
                'code' => 'SW-A1',
                'name' => 'Santri Weekend TK A-B',
                'class_level' => 'TK A-B',
                'description' => 'Program santri weekend untuk TK A dan B.',
                'status' => '1',
                'start_date' => '2025-03-02',
                'end_date' => '2025-04-01',
            ],
            [
                'program_class_id' => $programClassMap['Santri weekend'],
                'code' => 'SW-B1',
                'name' => 'Santri Weekend SD 1-6',
                'class_level' => 'SD 1-6',
                'description' => 'Program santri weekend untuk SD kelas 1 sampai 6.',
                'status' => '1',
                'start_date' => '2025-03-02',
                'end_date' => '2025-04-01',
            ],
            [
                'program_class_id' => $programClassMap['Santri weekend'],
                'code' => 'SW-C1',
                'name' => 'Santri Weekend SMP 7-9',
                'class_level' => 'SMP 7-9',
                'description' => 'Program santri weekend untuk SMP kelas 7 sampai 9.',
                'status' => '1',
                'start_date' => '2025-03-02',
                'end_date' => '2025-04-01',
            ],

            // =======================
            // PERUSAHAAN MENGAJI
            // =======================
            [
                'program_class_id' => $programClassMap['Perusahaan Mengaji'],
                'code' => 'PM-E1',
                'name' => 'Perusahaan Mengaji Umum',
                'class_level' => 'Umum',
                'description' => 'Program mengaji untuk kalangan umum.',
                'status' => '1',
                'start_date' => '2025-03-02',
                'end_date' => '2025-04-01',
            ],
        ];

        // Tambahkan UUID dan timestamp
        $data = array_map(function ($item) use ($now) {
            return array_merge($item, [
                'id' => Str::uuid(),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }, $data);

        LessonLevel::insert($data);
    }
}
