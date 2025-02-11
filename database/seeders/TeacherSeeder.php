<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);

        // Buat 10 teacher dan akun user secara otomatis
        Teacher::factory()->count(10)->create()->each(function ($teacher) use ($teacherRole) {
            // Buat akun user berdasarkan data teacher
            $user = User::create([
                'name' => $teacher->name,
                'email' => strtolower(str_replace(' ', '', $teacher->name)) . '@example.com', // Email unik
                'password' => Hash::make('password'), // Password default
            ]);

            // Tetapkan role teacher ke user
            $user->assignRole($teacherRole);

            // Opsional: Hubungkan User dengan Teacher jika ada kolom user_id di tabel teachers
            // $teacher->update(['user_id' => $user->id]);
        });
    }
}
