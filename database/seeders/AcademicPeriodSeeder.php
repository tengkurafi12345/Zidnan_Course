<?php

namespace Database\Seeders;

use App\Models\AcademicPeriod;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AcademicPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Desember 2025',
                'start_date' => '2025-12-01',
                'end_date' => '2025-12-31',
                'status' => 'active',
            ],
            [
                'name' => 'Januari 2026',
                'start_date' => '2026-01-01',
                'end_date' => '2026-01-31',
                'status' => 'inactive',
            ],
        ];

        foreach ($data as $item) {
            AcademicPeriod::create($item);
        }
    }


}
