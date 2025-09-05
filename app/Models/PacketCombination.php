<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PacketCombination extends Model
{
    /** @use HasFactory<\Database\Factories\PacketCombinationFactory> */
    use HasFactory, HasUuids;

    protected $table = 'packet_combinations';

    protected $fillable = [
        'lesson_level_id', 'program_id', 'price', 'published_on', 'status'
    ];

    /**
     * Get the lessonLevel that owns the PacketCombination
     *
     * @return BelongsTo
     */
    public function lessonLevel(): BelongsTo
    {
        return $this->belongsTo(LessonLevel::class, 'lesson_level_id');
    }

    /**
     * Get the program that owns the PacketCombination
     *
     * @return BelongsTo
     */
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

}
