<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherSalary extends Model
{
    protected $fillable = [
        'event_course_id',
        'amount',
    ];

    public function eventCourse()
    {
        return $this->belongsTo(EventCourse::class);
    }

    public function teacherPayrolls()
    {
        return $this->hasMany(TeacherPayroll::class);
    }
}
