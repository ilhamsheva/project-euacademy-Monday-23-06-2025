<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Payroll;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $start = $now->copy()->startOfMonth();
        $end = $now->copy()->endOfMonth();

        $nonTeachingEmployees = Employee::whereHas('department', function ($q){
            $q->where('name', '!=', 'Departemen Pengajar');
        })->get();

        foreach ($nonTeachingEmployees as $employee) {
            Payroll::firstOrCreate([
                'employee_id' => $employee->id,
                'period_start' => $start->format('Y-m-d'),
                'period_end' => $end->format('Y-m-d'),
            ], [
                'total_salary' => 5000000,
                'transfer_date' => now()->format('Y-m-d '),
                'remarks' => 'Gaji bulanan standar',
                'status' => 'pending',
            ]);
        }
    }
}
