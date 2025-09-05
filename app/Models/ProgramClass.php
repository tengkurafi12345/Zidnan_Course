<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ProgramClass extends Model
{
    use HasUuids;

    protected $table = "program_classes";
    protected $fillable = [
        'name',
        'caption',
        'description',
        'list_of_feature',
        'logo',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'list_of_content' => 'array',
    ];

}
