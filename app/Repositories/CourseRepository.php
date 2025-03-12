<?php

namespace App\Repositories;

use App\Interfaces\CourseRepositoryInterface;
use App\Models\Course;

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
}
