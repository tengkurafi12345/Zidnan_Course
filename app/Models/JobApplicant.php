<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobApplicant extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'job_applicants';

    protected $fillable = ['name', 'email', 'phone', 'address'];

    /**
     * @return HasMany
     */
    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }
}
