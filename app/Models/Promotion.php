<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory, HasUuids;

    protected $table = "promotions";
    protected $fillable = ['name', 'code_voucher', 'start_date', 'end_date', 'img_poster', 'term_and_conditions', 'discount'];
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'start_date' => 'date',
            'end_date' => 'date',
            'term_and_conditions' => 'array',
        ];
    }
}
