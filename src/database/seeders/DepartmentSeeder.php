<?php

namespace Database\Seeders;

use App\Models\BranchCompany;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $head = BranchCompany::where('name', 'Head Office')->first();
        $branch = BranchCompany::where('name', 'Branch Office')->first();

        $headDepartments = [
            ['Departemen Akademik', 'Mengatur kurikulum, rekap nilai, sertifikat, dan jadwal mengajar'],
            ['Departemen Administrasi', 'Mengelola absensi, gaji, dan cuti pegawai'],
            ['Departemen Operasional Digital', 'Mengelola website dan sistem LMS & HRM'],
            ['Departemen Pengajar', 'Mengajar, memberi tugas, dan menilai melalui LMS']
        ];

        $branchDepartments = [
            ['Departemen Akademik', 'Mengatur kurikulum, rekap nilai, sertifikat, dan jadwal mengajar di cabang'],
            ['Departemen Administrasi', 'Administrasi harian: absensi, gaji, cuti, pelaporan'],
            ['Departemen Pengajar', 'Mengajar, menyusun modul, memberi tugas dan nilai via LMS']
        ];

        foreach ($headDepartments as [$name, $desc]) {
            Department::firstOrCreate([
                'branch_company_id' => $head->id,
                'name' => $name,
                'description' => $desc
            ]);
        }

        foreach ($branchDepartments as [$name, $desc]) {
            Department::firstOrCreate([
                'branch_company_id' => $branch->id,
                'name' => $name,
                'description' => $desc
            ]);
        }
    }
}
