<?php

namespace Database\Seeders;

use App\Models\Packet;
use Illuminate\Database\Seeder;

class PacketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Packet::factory()->count(10)->create();
    }
}
