<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EventCourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = Employee::first(); // Ambil satu penanggung jawab

        EventCourse::insert([
            [
                'number' => 101,
                'name' => 'Bahasa Inggris Dasar',
                'description' => 'Pelajari dasar-dasar Bahasa Inggris untuk pemula.',
                'duration' => 6,
                'start' => '2025-07-01',
                'end' => '2025-07-30',
                'category' => 'English',
                'price' => 500000,
                'employee_id' => $employee->id,
                'photo' => 'english_basic.jpg',
            ],
            [
                'number' => 102,
                'name' => 'Bahasa Jepang Menengah',
                'description' => 'Kursus Bahasa Jepang tingkat menengah.',
                'duration' => 6,
                'start' => '2025-07-05',
                'end' => '2025-08-20',
                'category' => 'Japanese',
                'price' => 750000,
                'employee_id' => $employee->id,
                'photo' => 'japanese_intermediate.jpg',
            ],
        ]);
    }
}
