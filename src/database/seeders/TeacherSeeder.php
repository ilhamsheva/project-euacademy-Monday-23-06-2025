<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $teachingDepartment = Department::where('name', 'Departemen Pengajar')->first();

        if (!$teachingDepartment) {
            $this->command->error('Departemen Pengajar tidak ditemukan.');
            return;
        }

        $teachers = [
            [
                'fullname' => 'Sarah Yuliani',
                'email' => 'sarah@euacademy.test',
                'phone' => '081234567891',
                'gender' => 'P',
                'educational_background' => 'S2 Pendidikan Bahasa Inggris',
                'major' => 'Pendidikan Bahasa Inggris',
                'address' => 'Jl. Pendidikan No. 123, Jakarta',
            ],
            [
                'fullname' => 'Kenji Tanaka',
                'email' => 'kenji@euacademy.test',
                'phone' => '081234567892',
                'gender' => 'L',
                'educational_background' => 'S2 Sastra Jepang',
                'major' => 'Sastra Jepang',
                'address' => 'Jl. Sakura No. 15, Jakarta',
            ],
            [
                'fullname' => 'Andrea Simanjuntak',
                'email' => 'andrea@euacademy.test',
                'phone' => '081234567893',
                'gender' => 'P',
                'educational_background' => 'S1 Pendidikan Bahasa Inggris',
                'major' => 'Bahasa Inggris',
                'address' => 'Jl. Dahlia No. 5, Jakarta',
            ],
            [
                'fullname' => 'Takahiro Yamamoto',
                'email' => 'takahiro@euacademy.test',
                'phone' => '081234567894',
                'gender' => 'L',
                'educational_background' => 'S2 Linguistik Jepang',
                'major' => 'Bahasa Jepang',
                'address' => 'Jl. Kenanga No. 12, Tangerang',
            ],
            [
                'fullname' => 'Arif Setiawan',
                'email' => 'arif@euacademy.test',
                'phone' => '081234567895',
                'gender' => 'L',
                'educational_background' => 'S1 Bahasa dan Sastra Inggris',
                'major' => 'Bahasa Inggris',
                'address' => 'Jl. Merpati No. 7, Jakarta',
            ],
        ];

        foreach ($teachers as $data) {
            $firstName = explode(' ', $data['fullname'])[0];

            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $firstName,
                    'password' => bcrypt('password'),
                ]
            );

            Teacher::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'department_id' => $teachingDepartment->id,
                    'fullname' => $data['fullname'],
                    'phone' => $data['phone'],
                    'gender' => $data['gender'],
                    'educational_background' => $data['educational_background'],
                    'major' => $data['major'],
                    'address' => $data['address'],
                    'photo' => null,
                ]
            );
        }
    }
}
    