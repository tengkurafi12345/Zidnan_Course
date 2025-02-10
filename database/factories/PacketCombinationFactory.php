<?php

namespace Database\Factories;

use App\Models\Packet;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PacketCombination>
 */
class PacketCombinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'packet_id' => Packet::factory(),
            'program_id' => Program::factory(),
            'price' => $this->faker->randomFloat(2, 100),
        ];
    }
}
