<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'user_id',
        'employee_id',
        'first_name',
        'last_name',
        'email',
        'phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function teachingLoads()
{
    return $this->hasMany(TeachingLoad::class);
}
public function getFullNameAttribute()
{
    return "{$this->first_name} {$this->last_name}";
}
}