<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'branch_company_id',
        'name',
        'description',
    ];

    public function branchCompany()
    {
        return $this->belongsTo(BranchCompany::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
