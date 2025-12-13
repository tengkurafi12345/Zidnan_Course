<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $programs = [
            ['mdrn', 'Mandarin', 'Program pembelajaran Bahasa Mandarin (1 person / 1 jam)'],
            ['LP TI', 'Teknologi & Informasi', 'Pembelajaran teknologi dan informasi (1 person / 75 menit)'],
            ['MTBA', 'Matematika & Bahasa Arab', 'Pembelajaran matematika dan bahasa Arab (1 person / 1 jam)'],
            ['BIGMS', 'Bahasa Inggris & Mapel Sekolah', 'Bahasa Inggris dan mata pelajaran sekolah (1 person / 1 jam)'],
            ['AMI', 'All Mapel Islam', 'Seluruh mata pelajaran keislaman (1 person / 1 jam)'],
            ['MSMI', 'Mapel Sekolah & Mapel Islam', 'Mapel sekolah dan mapel Islam (1 person / 1 jam)'],
            ['TSMI', 'Tahsin & Mapel Islam', 'Tahsin dan mapel Islam (1 person / 1 jam)'],
            ['TSMS', 'Tahsin & Mapel Sekolah', 'Tahsin dan mapel sekolah (1 person / 1 jam)'],
            ['THMI', 'Tahfidz & Mapel Islam', 'Tahfidz dan mapel Islam (1 person / 1 jam)'],
            ['THMS', 'Tahfidz & Mapel Sekolah', 'Tahfidz dan mapel sekolah (1 person / 1 jam)'],
            ['CAMS', 'Calistung & Mapel Sekolah', 'Calistung dan mapel sekolah (1 person / 1 jam)'],
            ['CAMT', 'Calistung & Matematika', 'Calistung dan matematika (1 person / 1 jam)'],
            ['MTSA', 'Matematika & Sains', 'Matematika dan sains (1 person / 1 jam)'],
            ['MTMS', 'Matematika & Mapel Sekolah', 'Matematika dan mapel sekolah (1 person / 1 jam)'],
            ['MTBIG', 'Matematika & Bahasa Inggris', 'Matematika dan bahasa Inggris (1 person / 1 jam)'],
            ['AMS', 'All Mapel Sekolah', 'Seluruh mata pelajaran sekolah (1 person / 1 jam)'],
            ['BABIG', 'Bahasa Arab & Bahasa Inggris', 'Bahasa Arab dan Bahasa Inggris (1 person / 1 jam)'],
            ['TMT', 'Tahfidz & Matematika', 'Tahfidz dan matematika (1 person / 1 jam)'],
            ['IPAS', 'IPAS', 'Ilmu Pengetahuan Alam dan Sosial (1 person / 1 jam)'],
            ['TTC', 'Tahsin, Tahfidz & Calistung', 'Tahsin, tahfidz, dan calistung (1 person / 1 jam)'],
            ['CA', 'Calistung', 'Program calistung (1 person / 1 jam)'],
            ['APP', 'All Paket Program', 'Seluruh paket program (non outing class)'],
            ['CC', 'Cooking Class', 'Program cooking class berbasis produk'],
            ['OC', 'Outing Class', 'Program outing class (1 person / 1 jam)'],
            ['FQH', 'Fiqhussunnah', 'Pembelajaran fiqih sunnah (1 person / 1 jam)'],
            ['HRS', 'Hadist Riyadhus Sholihin', 'Kajian hadist Riyadhus Sholihin (1 person / 1 jam)'],
            ['TFS', 'Tafsir', 'Kajian tafsir Al-Qur’an (1 person / 1 jam)'],
            ['ASJ', 'Aswaja', 'Ahlussunnah wal Jama’ah (1 person / 1 jam)'],
            ['KMA', 'Kemuhammadiyaan', 'Kajian kemuhammadiyahan (1 person / 1 jam)'],
            ['THR', 'Tafsir & Hadist Riyadhus Sholihin', 'Tafsir dan hadist Riyadhus Sholihin (1 person / 1 jam)'],
            ['THS', 'Tahsin', 'Program tahsin Al-Qur’an (1 person / 1 jam)'],
            ['THF', 'Tahfidz', 'Program tahfidz Al-Qur’an (1 person / 1 jam)'],
            ['UTBK', 'UTBK', 'Persiapan UTBK (1 person / 1 jam)'],
            ['MS', 'Mapel Sekolah', 'Mata pelajaran sekolah (1 person / 1 jam)'],
            ['TI', 'Teknologi & Informasi', 'Teknologi dan informasi (1 person / 1 jam)'],
            ['CABI', 'Calistung & Bahasa Inggris', 'Calistung dan bahasa Inggris (1 person / 1 jam)'],
            ['TSCA', 'Tahsin & Calistung', 'Tahsin dan calistung (1 person / 1 jam)'],
            ['TFCA', 'Tahfidz & Calistung', 'Tahfidz dan calistung (1 person / 1 jam)'],
            ['TSBI', 'Tahsin & Bahasa Inggris', 'Tahsin dan bahasa Inggris (1 person / 1 jam)'],
            ['TBA', 'Tahsin & Bahasa Arab', 'Tahsin dan bahasa Arab (1 person / 1 jam)'],
            ['TTHF', 'Tahsin & Tahfidz', 'Tahsin dan tahfidz (1 person / 1 jam)'],
            ['BA', 'Bahasa Arab', 'Program bahasa Arab (1 person / 1 jam)'],
            ['BI', 'Bahasa Inggris', 'Program bahasa Inggris (1 person / 1 jam)'],
            ['TBG', 'Tahfidz & Bahasa Inggris', 'Tahfidz dan bahasa Inggris (1 person / 1 jam)'],
            ['MTK', 'Matematika', 'Program matematika (1 person / 1 jam)'],
            ['TBI', 'Tahfidz & Bahasa Arab', 'Tahfidz dan bahasa Arab (1 person / 1 jam)'],
        ];

        $data = array_map(function ($item) use ($now) {
            return [
                'id' => Str::uuid(),
                'code' => $item[0],
                'name' => $item[1],
                'description' => $item[2],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, $programs);

        Program::insert($data);
    }
}
