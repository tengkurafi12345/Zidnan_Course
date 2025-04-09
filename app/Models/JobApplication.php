<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use  HasFactory, HasUuids;

    protected $table = 'job_applications';

    protected $fillable = [
        'job_vacancy_id', 'job_applicant_id', 'resume_file',
        'cover_letter', 'status', 'applied_at'
    ];

    protected $casts = [
        'applied_at' => 'datetime',
        'resume_file' => 'string'
    ];

    /**
     * @return BelongsTo
     */
    public function jobVacancy(): BelongsTo
    {
        return $this->belongsTo(JobVacancy::class);
    }

    /**
     * @return BelongsTo
     */
    public function jobApplicant(): BelongsTo
    {
        return $this->belongsTo(JobApplicant::class);
    }
}
