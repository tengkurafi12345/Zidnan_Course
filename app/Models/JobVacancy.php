<?php

namespace App\Models;

use App\Enums\JobCategory;
use App\Enums\JobType;
use App\Enums\WorkPolicy;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobVacancy extends Model
{
    use HasFactory, HasUuids;

    protected $table = "job_vacancies";
    protected $fillable = [
        'title', 'location', 'category', 'job_type', 'work_policy',
        'salary_min', 'salary_max',
        'job_description', 'date_line', 'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'date_line' => 'date',
        'work_policy' => WorkPolicy::class,
        'job_type' => JobType::class,
        'category' => JobCategory::class,
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

    /**
     * @return HasMany
     */
    public function job_applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }
}
