<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CourseRepository implements CourseRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        
    }


    public function getAllCourses()
    {
        return Course::query()->get();
    }


    public function getCourseById($courseId)
    {
        return Course::findOrFail($courseId) ;
    }

    public function createCourse(array $data)
    {
        return DB::transaction(function () use ($data) {
            $course = Course::create([
                'title' => $data['title'],
                'slug' => $data['slug'],
                'description' => $data['description'],
                'couverture' => $data['couverture'],
                'langague' => $data['langague'],
                'status' => $data['status'],
                'duration' => $data['duration'],
                'difficulty_level' => $data['difficulty_level'],
                'category_id' => $data['category_id'],
                'sub_category_id' => $data['sub_category_id'],
                'mentor_id' => $data['mentor_id'],
            ]);

            if (isset($data['tags'])) {
                $course->tags()->attach($data['tags']);
            }

            return $course;
        });

    }

    public function updateCourse(array $data, Course $course)
    {
        return DB::transaction(function () use ($course, $data) {
            $course->update([
                'title' => $data['title'] ?? $course->title,
                'slug' => $data['slug'] ?? $course->slug,
                'description' => $data['description'] ?? $course->description,
                'duration' => $data['duration'] ?? $course->duration,
                'difficulty_level' => $data['difficulty_level'] ?? $course->difficulty_level,
                'category_id' => $data['category_id'] ?? $course->category_id,
                'sub_category_id' => $data['sub_category_id'] ?? $course->sub_category_id,
            ]);

            if (isset($data['tags'])) {
                $course->tags()->sync($data['tags']);
            }

            return $course;
        });
    }

    public function deleteCourse($courseId)
    {
        return Course::destroy($courseId);
    }


    public function getCoursesCountStatus()
    {
        return Course::select('status', DB::raw('count(*) as total'))->groupBy('CStatus')->get();
    }


    public function getCourseDistributionByCategoryAndSubCategory()
    {
        return Course::select(
           'categories.name as category_name',
                    'sub_categories.name as sub_category_name',
                    DB::raw('count(*) as total'))
                    ->join('categories', 'courses.category_id', '=', 'categories.id')
                    ->leftJoin('sub_categories', 'courses.sub_category_id', '=', 'sub_categories.id')
                    ->groupBy('categories.name', 'sub_categories.name')->get();
    }
}
