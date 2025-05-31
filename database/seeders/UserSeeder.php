<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan role sudah ada sebelum meng-assign user
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $guardianRole = Role::firstOrCreate(['name' => 'guardian']);

        // Buat Admin
        $admin = User::create([
            'name' => 'Admin User',
            'username' => 'admin',
            'phone' => '0123456788',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole($adminRole);

        // Buat User guru
        $teacher = User::create([
            'name' => 'Teacher',
            'username' => 'teacher',
            'phone' => '0123456789',
            'email' => 'teacher@example.com',
            'password' => Hash::make('password'),
        ]);
        $teacher->assignRole($teacherRole);

        // Buat User Wali
        $guardian = User::create([
            'name' => 'Guardian',
            'username' => 'guardian',
            'phone' => '085785785111',
            'email' => 'guardian@example.com',
            'password' => Hash::make('password'),
        ]);
        $guardian->assignRole($guardianRole);
    }
}
