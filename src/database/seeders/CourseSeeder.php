<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::insert([
            [
                'class_id' => 1, // A1 - Pemula
                'teacher_id' => 1,
                'event_course_id' => 1, // Bahasa Inggris Dasar
                'name' => 'Sesi 1 - Bahasa Inggris Dasar',
                'date' => '2025-07-01',
                'start' => '2025-07-01',
                'end' => '2025-07-30',
                'status' => 'upcoming',

            ],
            [
                'class_id' => 2, // B2 - Menengah
                'teacher_id' => 2,
                'event_course_id' => 2, // Bahasa Jepang Menengah
                'name' => 'Sesi 1 - Bahasa Jepang Menengah',
                'date' => '2025-07-05',
                'start' => '2025-07-05',
                'end' => '2025-08-20',
                'status' => 'upcoming',

            ],
        ]);
    }
}
