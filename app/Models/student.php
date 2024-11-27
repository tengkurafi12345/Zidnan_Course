<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $table = "students";

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'degree',
    ];


}
