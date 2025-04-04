<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'teachers';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'birthday',
        'birthplace',
        'domicile',
        'status',
        'start_joining',
        'bio',
        'created_at',
        'updated_at',
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
