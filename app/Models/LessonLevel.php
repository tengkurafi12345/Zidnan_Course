<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LessonLevel extends Model
{
    use HasFactory, HasUuids;

    protected $table = "lesson_levels";
    protected $fillable = [
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

}
