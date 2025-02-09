<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'birthday' => $this->faker->date,
            'birthplace' => $this->faker->city,
            'domicile' => $this->faker->city,
            'status' => $this->faker->boolean,
            'start_joining' => Carbon::now()->subYears(rand(1, 10)),
            'bio' => $this->faker->paragraph,
        ];
    }
}
