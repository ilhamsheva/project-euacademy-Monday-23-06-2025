<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseClass extends Model
{
    protected $fillable = [
        'class_number',
        'qualifiaction',
        'branch_id'
    ];

    public function branch()
    {
        return $this->belongsTo(BranchCompany::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function teacherAbsences()
    {
        return $this->hasMany(TeacherAbsence::class);
    }
}
