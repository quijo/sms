<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Enrollment;

class Subject extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'level',
    ];

    public function gradeLevels()
{
    return $this->belongsToMany(GradeLevel::class, 'grade_level_subject');
}
public function enrollments()
{
    return $this->belongsToMany(Enrollment::class, 'enrollment_subject')
        ->withPivot('is_custom')
        ->withTimestamps();
}

public function gradeLevel()
{
    return $this->belongsTo(GradeLevel::class);
}
public function teachingLoads()
{
    return $this->hasMany(TeachingLoad::class);
}

}