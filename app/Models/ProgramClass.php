<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProgramClass extends Model
{
    use HasUuids;

    protected $table = "program_classes";
    protected $fillable = [
        'name',
        'caption',
        'description',
        'list_of_feature',
        'logo',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'list_of_feature' => 'array',
    ];

    /**
     * Get all of the lessonLevels for the programClass
     *
     * @return HasMany
     */
    public function lessonLevels(): HasMany
    {
        return $this->hasMany(LessonLevel::class, 'lesson_level_id');
    }

}
