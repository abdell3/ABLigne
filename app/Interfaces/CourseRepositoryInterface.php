<?php

namespace App\Interfaces;

interface CourseRepositoryInterface
{
    public function getAllCourses();

    public function getCourseById($courseId);

    public function createCourse(array $data);

    public function updateCourse(array $detail, $courseId);

    public function deleteCourse($courseId);
}
