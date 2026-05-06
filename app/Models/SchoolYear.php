<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class SchoolYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'start_date',
        'end_date',
        'is_active',
    ];
}
