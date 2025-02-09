<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{
    use HasFactory, HasUuids;

    protected $table = "packets";
    protected $fillable = [
        'code',
        'name',
        'class_level',
        'price',
        'status',
        'description',
        'start_date',
        'end_date',
        'created_at',
        'updated_at'
    ];


}
