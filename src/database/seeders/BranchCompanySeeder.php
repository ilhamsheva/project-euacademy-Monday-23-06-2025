<?php

namespace Database\Seeders;

use App\Models\BranchCompany;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::where('name', 'EU Academy')->first();

        BranchCompany::insert([
            [
                'company_id' => $company->id,
                'name' => 'Head Office',
                'address' => 'Jakarta',
            ],
            [
                'company_id' => $company->id,
                'name' => 'Branch Office',
                'address' => 'Tangerang',
            ]
        ]);
    }
}
