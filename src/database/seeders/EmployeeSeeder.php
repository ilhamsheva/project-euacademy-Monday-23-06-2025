<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $deptAkademik = Department::where('name', 'Departemen Akademik')->first();
        $deptAdmin = Department::where('name', 'Departemen Administrasi')->first();
        $deptOps = Department::where('name', 'Departemen Operasional Digital')->first();

        $employees = [
            [
                'fullname' => 'Rina Oktaviani',
                'email' => 'akademik@euacademy.test',
                'gender' => 'P',
                'phone' => '081234567891',
                'address' => 'Jl. Melati No. 1, Jakarta',
                'department_id' => $deptAkademik->id,
            ],
            [
                'fullname' => 'Doni Haryanto',
                'email' => 'admin@euacademy.test',
                'gender' => 'L',
                'phone' => '081234567892',
                'address' => 'Jl. Mawar No. 2, Jakarta',
                'department_id' => $deptAdmin->id,
            ],
            [
                'fullname' => 'Fitri Andayani',
                'email' => 'opsdigital@euacademy.test',
                'gender' => 'P',
                'phone' => '081234567893',
                'address' => 'Jl. Teratai No. 3, Jakarta',
                'department_id' => $deptOps->id,
            ],
        ];

        foreach ($employees as $data) {
            // Ambil nama depan dari fullname
            $firstName = explode(' ', $data['fullname'])[0];

            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $firstName,
                    'password' => bcrypt('password'),
                ]
            );

            Employee::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'department_id' => $data['department_id'],
                    'fullname' => $data['fullname'],
                    'phone' => $data['phone'],
                    'gender' => $data['gender'],
                    'address' => $data['address'],
                ]
            );
        }
    }
}
