<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'class_id',
        'teacher_id',
        'event_course_id',
        'name',
        'date',
        'start',
        'end',
        'status'
    ];

    public function class()
    {
        return $this->belongsTo(CourseClass::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function eventCourse()
    {
        return $this->belongsTo(EventCourse::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function moduls()
    {
        return $this->hasMany(Modul::class);
    }
}
