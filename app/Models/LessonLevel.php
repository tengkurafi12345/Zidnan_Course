<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LessonLevel extends Model
{
    use HasFactory, HasUuids;

    protected $table = "lesson_levels";
    protected $fillable = [
        'program_class_id',
        'code',
        'name',
        'class_level',
        'status',
        'description',
        'start_date',
        'end_date',
        'created_at',
        'updated_at'
    ];

    /**
     * Get all of the packetCombinations for the LessonLevel
     *
     * @return HasMany
     */
    public function packetCombinations(): HasMany
    {
        return $this->hasMany(PacketCombination::class, 'lesson_level_id');
    }


    /**
     * Get the programClass that owns the LessonLevel
     *
     * @return BelongsTo
     */
    public function programClass(): BelongsTo
    {
        return $this->belongsTo(ProgramClass::class, 'program_class_id');
    }

}
