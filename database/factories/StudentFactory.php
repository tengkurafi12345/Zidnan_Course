<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'registration_number' => $this->faker->unique()->numerify('REG-#####'),
            'birth_date' => $this->faker->date,
            'birth_place' => $this->faker->city(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'age' => $this->faker->numberBetween(6, 18),
            'class_status' => $this->faker->randomElement(['Active', 'Inactive']),
            'school_name' => $this->faker->company,
            'address' => $this->faker->address,
            'district' => $this->faker->city,
            'phone_number' => $this->faker->phoneNumber,
            'blood_type' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'father_name' => $this->faker->name('male'),
            'mother_name' => $this->faker->name('female'),
            'father_occupation' => $this->faker->jobTitle,
            'mother_occupation' => $this->faker->jobTitle,
        ];
    }
}
