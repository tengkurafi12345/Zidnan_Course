<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'code',
        'name',
        'price',
        'description',
        'estimate_time',
        'is_active',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryCourse::class);
    }

}
