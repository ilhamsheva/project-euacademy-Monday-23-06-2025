<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CompanySeeder::class,
            BranchCompanySeeder::class,
            DepartmentSeeder::class,
            EmployeeSeeder::class,
            TeacherSeeder::class,
            EmployeeAbsenceSeeder::class,
            PayrollSeeder::class,
            EventCourseSeeder::class,
            CourseClassSeeder::class,
            CourseSeeder::class,
        ]);
    }
}
