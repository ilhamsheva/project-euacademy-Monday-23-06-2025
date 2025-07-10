<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchCompany extends Model
{
    protected $fillable = [
        'company_id',
        'name',
        'address',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function employees()
    {
        return $this->hasManyThrough(Employee::class, Department::class);
    }

    public function courseClasses()
    {
        return $this->hasMany(CourseClass::class);
    }
}
