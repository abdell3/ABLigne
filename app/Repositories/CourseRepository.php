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
        return Course::create($data) ;
    }

    public function updateCourse(array $detail, $courseId)
    {
        return Course::whereId($courseId)->update($detail) ;
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
