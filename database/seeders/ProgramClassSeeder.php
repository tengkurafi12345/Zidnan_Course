<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\ProgramClass;
use Illuminate\Database\Seeder;

class ProgramClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $data = [
            [
                'id' => Str::uuid(),
                'name' => 'Les Private',
                'caption' => 'Belajar Lebih Fokus, Guru Datang ke Rumah Anda!',
                'description' => 'Les Private adalah solusi ideal bagi siswa yang ingin belajar dengan pendampingan intensif langsung di rumah. Dengan jadwal fleksibel, siswa dari jenjang TK hingga SMA dapat memilih berbagai paket pembelajaran, seperti tahfidz dan mata pelajaran umum. Program ini memungkinkan siswa mendapatkan perhatian penuh dari guru, sehingga pembelajaran lebih efektif dan sesuai dengan kebutuhan individu',
                'list_of_feature' => json_encode([
                    'Guru datang ke rumah, lebih nyaman dan fleksibel',
                    'Fokus penuh pada kebutuhan dan kemampuan siswa',
                    'Bisa memilih berbagai mata pelajaran, termasuk tahfidz',
                    'Jadwal belajar lebih fleksibel dan menyesuaikan kesibukan siswa'
                ]),
                'logo' => 'program/reguler.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Les Bimbel',
                'caption' => 'Belajar Bersama, Suasana Nyaman, Hasil Maksimal!',
                'description' => 'Les Bimbel memberikan pengalaman belajar yang lebih terstruktur dalam suasana kelas di kantor utama Zidnan Group. Dengan fasilitas lengkap dan guru berpengalaman, siswa dari jenjang TK hingga SMA dapat mengikuti pembelajaran yang mencakup tahfidz hingga mata pelajaran umum. Belajar bersama teman sebaya juga meningkatkan semangat dan pemahaman melalui diskusi serta interaksi sosial yang positif',
                'list_of_feature' => json_encode([
                    'Kelas interaktif dengan suasana belajar kondusif',
                    'Materi terstruktur',
                    'bimbingan guru berpengalaman',
                    'Interaksi sosial meningkatkan motivasi belajar'
                ]),
                'logo' => 'program/online.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Santri weekend',
                'caption' => 'Belajar Agama dan Akademik di Akhir Pekan!',
                'description' => 'Program Santri Weekend dirancang khusus untuk siswa yang ingin memperdalam pengetahuan agama Islam sambil tetap mengikuti pelajaran akademik. Dengan jadwal belajar di akhir pekan, siswa dapat menyeimbangkan antara pendidikan formal dan pengembangan spiritual. Program ini mencakup pembelajaran tahfidz, fiqh, dan mata pelajaran umum, memberikan pengalaman belajar yang komprehensif dan menyenangkan',
                'list_of_feature' => json_encode([
                    'Kombinasi pembelajaran agama dan akademik',
                    'Jadwal fleksibel di akhir pekan',
                    'Pengembangan karakter dan spiritual siswa',
                    'Fasilitas lengkap untuk mendukung proses belajar'
                ]),
                'logo' => 'program/santri.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Perusahaan Mengaji',
                'caption' => 'Mengaji Mudah untuk Semua Kalangan, dari Remaja hingga Dewasa!',
                'despcription' => 'Program Perusahaan Mengaji dirancang untuk memudahkan individu dari berbagai kalangan, mulai dari remaja hingga dewasa, dalam mempelajari Al-Qur\'an. Dengan pendekatan yang fleksibel dan metode pembelajaran yang efektif, peserta dapat mengembangkan kemampuan membaca, memahami, dan menghafal Al-Qur\'an sesuai dengan kebutuhan mereka. Program ini cocok untuk mereka yang ingin memperdalam pengetahuan agama tanpa mengganggu rutinitas harian',
                'list_of_feature' => json_encode([
                    'Metode pembelajaran yang fleksibel dan efektif',
                    'Cocok untuk remaja hingga dewasa',
                    'Fokus pada pemahaman dan penghafalan Al-Qur\'an',
                    'Dapat disesuaikan dengan jadwal peserta'
                ]),
                'logo' => 'program/perusahaan-mengaji.png',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];

        ProgramClass::insert($data);
    }
}