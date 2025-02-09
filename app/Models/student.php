<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory, HasUuids;

    protected $table = "students";

    protected $fillable = [
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
     * @return response()
     */
    protected function casts(): array
    {
        return [
            'gender' => Gender::class,
        ];
    }


}
