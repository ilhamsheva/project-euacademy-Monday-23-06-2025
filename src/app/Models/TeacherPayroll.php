<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherPayroll extends Model
{
    protected $fillable = [
        'teacher_salary_id',
        'teacher_id',
        'period_start',
        'period_end',
        'total_classes',
        'total_salary',
        'transfer_date',
        'remarks',
        'status',
    ];

    public function teacherSalary()
    {
        return $this->belongsTo(TeacherSalary::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
