<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeacherPlacement extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'teacher_placements';

    protected $fillable = [
       'academic_period_id', 'teacher_id', 'student_id', 'packet_combination_id', 'meeting_times', 'duration_minutes'
    ];

    /**
     * Get the academicPeriod that owns the TeacherPlacement
     *
     * @return BelongsTo
     */
    public function academicPeriod(): BelongsTo
    {
        return $this->belongsTo(AcademicPeriod::class, 'academic_period_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function packetCombination()
    {
        return $this->belongsTo(PacketCombination::class, 'packet_combination_id');
    }

    /**
     * Get all of the meetings for the TeacherPlacement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meetings(): HasMany
    {
        return $this->hasMany(Meeting::class);
    }
}
