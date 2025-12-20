<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (App::environment('production')) {
            $this->command?->warn('Database seeding skipped in production environment.');
            return;
        }
        
        $this->call([
            AcademicPeriodSeeder::class,
            ProgramClassSeeder::class,
            LessonLevelSeeder::class,
            ProgramSeeder::class,
            PacketCombinationSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            TeacherPlacementSeeder::class,
            UserSeeder::class,
            PromotionSeeder::class,
            JobSeeder::class,
            TestimonialSeeder::class,
        ]);

        // $admin = User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $admin->assignRole('admin');
    }
}
