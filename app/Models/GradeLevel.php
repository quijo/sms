<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
     protected $fillable = [
        'name',
        'code',
        'order',
        'is_active',
    ];
    public function subjects()
{
      return $this->belongsToMany(
        \App\Models\Subject::class,
        'grade_level_subject',
        'grade_level_id',
        'subject_id'
    );
}
public function gradeLevels()
{
    return $this->belongsToMany(GradeLevel::class);
}
}
