<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = User::whereHas('roles', fn($q) => $q->where('name', 'student'))->get();
        $courses = Course::all();

        foreach ($students as $student) {
            $randomCourses = $courses->random(rand(1, 5)); 
                foreach ($randomCourses as $course) {
                        Enrollment::create([
                        'user_id' => $student->id,
                        'course_id' => $course->id,
                        'status' => rand(0, 1) ? 'accepted' : 'pending', 
                    ]);
                }
            }
    }
}
