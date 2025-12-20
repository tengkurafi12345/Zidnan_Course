<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcademicPeriod extends Model
{
    /** @use HasFactory<\Database\Factories\AcademicPeriodFactory> */
    use HasFactory, HasUuids;
    protected $table = "academic_periods";

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'status',
        'created_at',
        'updated_at'
    ];

    /**
     * Get all of the teacherPlacements for the AcademicPeriod
     *
     * @return HasMany
     */
    public function teacherPlacements(): HasMany
    {
        return $this->hasMany(TeacherPlacement::class, 'academic_period_id');
    }


    /**
     * Get all of the meetings for the AcademicPeriod
     *
     * @return HasMany
     */
    public function meetings(): HasMany
    {
        return $this->hasMany(Meeting::class, 'academic_period_id');
    }
}
