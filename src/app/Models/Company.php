<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'logo',
    ];

    public function branchCompanies()
    {
        return $this->hasMany(BranchCompany::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class, BranchCompany::class);
    }
}
