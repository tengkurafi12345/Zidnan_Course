<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeacherPlacement extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'teacher_placements';

    protected $fillable = [
        'teacher_id', 'student_id', 'packet_combination_id', 'meeting_times'
    ];

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
