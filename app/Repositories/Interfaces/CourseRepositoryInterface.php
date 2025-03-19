<?php

namespace App\Repositories\Interfaces;

use App\Models\Course;

interface CourseRepositoryInterface
{
    public function getAllCourses();

    public function getCourseById($courseId);

    public function createCourse(array $data);

    public function updateCourse(array $data, Course $course);

    public function deleteCourse($courseId);
}
