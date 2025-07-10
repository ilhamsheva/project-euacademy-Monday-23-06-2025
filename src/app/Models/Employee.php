<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'department_id',
        'user_id',
        'fullname',
        'phone',
        'gender',
        'address',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branchCompany()
    {
        return $this->belongsToThrough(BranchCompany::class, Department::class);
    }

    public function company()
    {
        return $this->belongsToThrough(Company::class, [Department::class, BranchCompany::class]);
    }

    public function absences()
    {
        return $this->hasMany(EmployeeAbsence::class);
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }

    public function eventCourses(){
        return $this->hasMany(EventCourse::class);
    }
}
