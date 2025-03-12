<?php

namespace App\Services;

use App\Repositories\CourseRepository;

class CourseService
{


    protected $courseRepository;



    /**
     * Create a new class instance.
     */
    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }


    public function getAllCourses()
    {
        return $this->courseRepository->getAllCourses();
    }


    public function getCourseById($courseId)
    {
        return $this->courseRepository->getCourseById($courseId);
    }


    public function createCourse(array $data)
    {
        return $this->courseRepository->createCourse($data);
    }


    public function updateCourse(array $detail, $courseId)
    {
        return $this->courseRepository->updateCourse($detail, $courseId);
    }


    public function deleteCourse($courseId)
    {
        return $this->courseRepository->deleteCourse($courseId);
    }


}
