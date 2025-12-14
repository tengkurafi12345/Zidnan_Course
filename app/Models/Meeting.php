<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    /** @use HasFactory<\Database\Factories\MeetingFactory> */
    use HasFactory, HasUuids;

    protected $table = "meetings";
    protected $fillable = [
        "teacher_placement_id",
        "code",
        "duration_minutes",
        "scheduled_start_time",
        "scheduled_end_time",
        "actual_start_time",
        "actual_end_time",
        "attendance_status",
        "location",
        "daily_report",
    ];

    protected $casts = [
        'scheduled_start_time' => 'datetime',
        'scheduled_end_time' => 'datetime',
        'actual_start_time' => 'datetime',
        'actual_end_time' => 'datetime',
    ];

    public function teacherPlacement()
    {
        return $this->belongsTo(TeacherPlacement::class);
    }
}
