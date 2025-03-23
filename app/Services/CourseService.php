<?php

namespace App\Services;

use App\Repositories\CourseRepository;
use Illuminate\Support\Facades\Auth;

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
        $data['mentor_id'] = Auth::id();
        return $this->courseRepository->createCourse($data);
    }


    public function updateCourse(array $detail, $courseId)
    {

            $course = $this->courseRepository->getCourseById($courseId);

            if($course->mentor_id != Auth::id())
            {
                throw new \Exception('Vous avez pas le droit de modifier ce cours.');
            }

            return $this->courseRepository->updateCourse($detail, $course);
    }


    public function deleteCourse($courseId)
    {
        $course = $this->courseRepository->getCourseById($courseId);

        if($course->mentor_id != Auth::id())
        {
            throw new \Exception('vous avez pas le droit de supprimer ce cour');
        }

        return $this->courseRepository->deleteCourse($course);
    }

    public function getCourseCountByStatus()
    {
        return $this->courseRepository->getCoursesCountStatus();
    }

    public function ditribution()
    {
        return $this->courseRepository->getCourseDistributionByCategoryAndSubCategory();
    }


}
