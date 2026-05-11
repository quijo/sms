<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'program_id',
        'grade_level',
        'is_active',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function sections()
{
    return $this->hasMany(Section::class);
}
public function gradeLevel()
{
    return $this->belongsTo(GradeLevel::class);
}
public function adviser()
{
    return $this->belongsTo(Teacher::class, 'adviser_id');
}
}