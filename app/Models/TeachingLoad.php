<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeachingLoad extends Model
{
    protected $fillable = [
        'teacher_id',
        'subject_id',
        'section_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
