<?php

namespace Database\Seeders;

use App\Models\PacketCombination;
use Illuminate\Database\Seeder;

class PacketCombinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PacketCombination::factory()->count(30)->create();
    }
}
