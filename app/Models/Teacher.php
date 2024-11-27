<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    protected $fillable = ['name', 'email', 'phone', 'address', 'gender', 'role', 'bio'];

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

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_teacher', 'teacher_id', 'course_id');
    }
}
