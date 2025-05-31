<?php

namespace App\Models;

use App\Enums\Gender;
use Database\Factories\StudentFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    /** @use HasFactory<StudentFactory> */
    use HasFactory, HasUuids;

    protected $table = "students";

    protected $fillable = [
        'id',
        'name',
        'registration_number',
        'birth_date',
        'birth_place',
        'gender',
        'age',
        'class_status',
        'school_name',
        'address',
        'district',
        'phone_number',
        'blood_type',
        'father_name',
        'mother_name',
        'father_occupation',
        'mother_occupation',
    ];

    /**
     * Write code on Method
     *
     * @return array ()
     */
    protected function casts(): array
    {
        return [
            'gender' => Gender::class,
        ];
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', "id");
    }

    /**
     * @return HasOne
     */
    public function guardians(): HasOne
    {
        return $this->hasOne(Guardians::class);
    }
}
