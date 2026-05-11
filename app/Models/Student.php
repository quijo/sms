<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $fillable = [
        'user_id',
        'enrollment_id',
        'program_id',
        'grade_level_id',
        'section_id',
        'student_number',
        'admitted_at',
    ];
      public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function gradeLevel()
    {
       return $this->belongsTo(GradeLevel::class);
    }

  public function enrollments()
{
    return $this->hasMany(Enrollment::class);
}

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    protected static function booted()
{
    static::created(function ($student) {
        if (!$student->student_number) {
            $student->updateQuietly([
                'student_number' => self::generateStudentNumber($student->id),
            ]);
        }
    });
}
public function subjects()
{
    return $this->hasManyThrough(
        Subject::class,
        GradeLevel::class,
        'id',
        'id',
        'grade_level_id',
        'id'
    );
}

protected static function generateStudentNumber($id): string
{
    return 'STU-' . date('Y') . '-' . str_pad($id, 5, '0', STR_PAD_LEFT);
}



  
}
