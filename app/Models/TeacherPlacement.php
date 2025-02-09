<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherPlacement extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherPlacementFactory> */
    use HasFactory, HasUuids;

    protected $table = 'teacher_placements';

    protected $fillable = [
        'teacher_id', 'student_id', 'packet_combination_id'
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
}
