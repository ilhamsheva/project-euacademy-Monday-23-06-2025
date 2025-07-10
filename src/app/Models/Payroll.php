<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
        'employee_id',
        'period_start',
        'period_end',
        'total_salary',
        'transfer_date',
        'remarks',
        'status',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
