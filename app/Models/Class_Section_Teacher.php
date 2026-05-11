<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSubjectTeacher extends Model
{
    protected $fillable = [
        'teacher_id',
        'subject_id',
        'section_id',
    ];
}