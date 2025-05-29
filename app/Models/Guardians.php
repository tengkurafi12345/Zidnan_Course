<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guardians extends Model
{
    use HasUuids;

    protected $table = 'guardians';
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'student_id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
