<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventCourse extends Model
{
    protected $fillable = [
        'number',
        'name',
        'description',
        'duration',
        'start',
        'end',
        'category',
        'price',
        'employee_id',
        'photo',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function batches(){
        return $this->hasMany(Batch::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function teacherSalaries()
    {
        return $this->hasMany(TeacherSalary::class);
    }
}
