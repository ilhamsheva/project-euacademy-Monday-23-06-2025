<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'user_id',
        'department_id',
        'fullname',
        'phone',
        'educational_background',
        'major',
        'gender',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function teacherPayrolls()
    {
        return $this->hasMany(TeacherPayroll::class);
    }

    public function teacherAbsences()
    {
        return $this->hasMany(TeacherAbsence::class);
    }
}
