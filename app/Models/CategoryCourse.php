<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCourse extends Model
{
    use HasFactory;

    protected $table = 'category_courses';
    protected $fillable = ['name', 'description', 'slug', 'order', 'is_active'];


    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id', 'id');
    }
}
