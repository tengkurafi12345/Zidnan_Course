<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'caption' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'list_of_feature' => $this->faker->randomElements(
                ['Feature A', 'Feature B', 'Feature C', 'Feature D', 'Feature E'],
                $this->faker->numberBetween(1, 5)
            ),
            'logo' => $this->faker->imageUrl(200, 200, 'education', true, 'Logo'),
        ];
    }
}
