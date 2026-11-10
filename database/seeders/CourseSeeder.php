<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            ['name' => 'Web Development', 'code' => 'CS301', 'credit_hours' => 3],
            ['name' => 'Database Systems', 'code' => 'CS302', 'credit_hours' => 3],
        ];

        foreach ($courses as $course) {
            Course::updateOrCreate(['code' => $course['code']], $course);
        }
    }
}