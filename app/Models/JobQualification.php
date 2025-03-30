<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobQualification extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['job_vacancy_id', 'description', 'items'];

    protected $casts = [
        'items' => 'array', // Simpan dalam bentuk JSON
    ];

    /**
     * @return BelongsTo
     */
    public function jobVacancy(): BelongsTo
    {
        return $this->belongsTo(JobVacancy::class);
    }
}
