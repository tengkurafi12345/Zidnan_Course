<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacketCombination extends Model
{
    /** @use HasFactory<\Database\Factories\PacketCombinationFactory> */
    use HasFactory, HasUuids;

    protected $table = 'packet_combinations';

    protected $fillable = [
        'lesson_level_id', 'program_id', 'price', 'published_on', 'status'
    ];

    public function lessonLevel()
    {
        return $this->belongsTo(LessonLevel::class, 'lesson_level_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

}
