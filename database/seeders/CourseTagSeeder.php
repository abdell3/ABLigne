<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::pluck('id')->toArray();
        $tags = Tag::pluck('id')->toArray();

        
        foreach (range(1, 20) as $index) { 
            DB::table('course_tag')->insert([
                'course_id' => $courses[array_rand($courses)], 
                'tag_id' => $tags[array_rand($tags)], 
            ]);
        }
    }
}
