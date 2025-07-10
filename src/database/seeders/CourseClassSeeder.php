<?php

namespace Database\Seeders;

use App\Models\BranchCompany;
use App\Models\CourseClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branch = BranchCompany::first(); // Ambil satu cabang perusahaan
        CourseClass::insert([
            [
                'class_number' => 'A1',
                'qualifiaction' => 'Pemula',
                'branch_id' => $branch->id,
            ],
            [
                'class_number' => 'B2',
                'qualifiaction' => 'Menengah',
                'branch_id' => $branch->id,
            ],
        ]);
    }
}
