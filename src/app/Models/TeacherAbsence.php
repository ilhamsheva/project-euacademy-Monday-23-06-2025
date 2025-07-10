<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherAbsence extends Model
{
    protected $fillable = [
        'teacher_id',
        'course_class_id',
        'date',
        'status',
        'remarks',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class);
    }
}
