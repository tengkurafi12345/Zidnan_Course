<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory, HasUuids;

    protected $table = "programs";
    protected $fillable = ['code', 'name', 'meeting_times', 'description'];

    public function packetCombinations()
    {
        return $this->hasMany(PacketCombination::class, 'program_id');
    }
}
