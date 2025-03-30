<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    use HasFactory, HasUuids;

    protected $table = "job_vacancies";
    protected $fillable = [
        'title',
        'location',
        'employment_type',
        'job_type',
        'salary_max',
        'salary_min',
        'currency',
        'job_description',
        'date_line',
        'published_at',
        'created_at',
        'updated_at'
    ];

}
