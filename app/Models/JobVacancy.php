<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobVacancy extends Model
{
    use HasFactory, HasUuids;

    protected $table = "job_vacancies";
    protected $fillable = [
        'title', 'location', 'employment_type', 'job_type', 'work_policy',
        'salary_min', 'salary_max', 'currency',
        'job_description', 'date_line', 'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'date_line' => 'date',
    ];

    /**
     * @return HasMany
     */
    public function responsibilities(): HasMany
    {
        return $this->hasMany(JobResponsibility::class);
    }

    /**
     * @return HasMany
     */
    public function qualifications(): HasMany
    {
        return $this->hasMany(JobQualification::class);
    }

}
