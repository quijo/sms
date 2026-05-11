<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Enrollment extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'birthdate',
        'gender',
        'address',
        'program_id',
        'grade_level_id',
        'section_id',
        'school_year',
        'student_type',
        'status',
    ];

    // =========================
    // RELATIONSHIPS
    // =========================

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(
            \App\Models\Subject::class,
            'enrollment_subject',
            'enrollment_id',
            'subject_id'
        )->withPivot('is_custom');
    }

    // =========================
    // APPROVAL LOGIC (CLEANED)
    // =========================

    public function approve(): void
    {
        $this->update([
            'status' => 'approved',
        ]);

        // ONLY ONE PLACE HANDLES STUDENT CREATION (booted)
        $this->user?->assignRole('student');
    }

    // =========================
    // BOOT LOGIC
    // =========================

    protected static function booted(): void
    {
        static::updated(function ($enrollment) {

            if ($enrollment->wasChanged('status') && $enrollment->status === 'approved') {

                if (!$enrollment->user_id) {
                    logger()->error("Enrollment {$enrollment->id} has no user_id");
                    return;
                }

                \App\Models\Student::firstOrCreate(
                    [
                        'enrollment_id' => $enrollment->id,
                    ],
                    [
                        'user_id' => $enrollment->user_id,
                        'program_id' => $enrollment->program_id,
                        'grade_level_id' => $enrollment->grade_level_id,
                        'section_id' => $enrollment->section_id,
                        'student_number' => static::generateStudentNumber($enrollment->id),
                        'admitted_at' => now(),
                    ]
                );

                $enrollment->user?->assignRole('student');
            }
        });
    }

    // =========================
    // UTIL
    // =========================

    protected static function generateStudentNumber($id): string
    {
        return 'STU-' . now()->year . '-' . str_pad($id, 5, '0', STR_PAD_LEFT);
    }

}
