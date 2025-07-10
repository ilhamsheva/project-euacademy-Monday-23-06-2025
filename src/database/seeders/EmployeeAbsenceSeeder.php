<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\EmployeeAbsence;
use Carbon\Carbon;

class EmployeeAbsenceSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::with('department')->get();

        $startDate = Carbon::now()->startOfWeek(Carbon::MONDAY)->subWeek(); // minggu lalu
        $endDate = $startDate->copy()->addDays(4); // Senin–Jumat

        foreach ($employees as $employee) {
            $date = $startDate->copy();

            while ($date->lte($endDate)) {
                // Skip weekend (harusnya sudah aman tapi untuk berjaga-jaga)
                if ($date->isWeekend()) {
                    $date->addDay();
                    continue;
                }

                // Status disimulasikan acak
                $rand = rand(1, 100);
                $status = match (true) {
                    $rand <= 5 => 'leave',
                    $rand <= 15 => 'sick',
                    $rand <= 20 => 'absent',
                    default => 'present',
                };

                EmployeeAbsence::updateOrCreate([
                    'employee_id' => $employee->id,
                    'date' => $date->toDateString(),
                ], [
                    'status' => $status,
                    'remarks' => $status === 'present' ? null : ucfirst($status) . ' pada ' . $date->translatedFormat('l'),
                ]);

                $date->addDay();
            }
        }
    }
}
