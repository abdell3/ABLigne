<?php

namespace App\Repositories\Interfaces;

interface StudentRepositoryInterface
{
    public function getAllStudents();
    public function getStudentById($studentId);
    public function createStudent(array $studentDetails);
    public function updateStudent($studentId, array $newDetails);
    public function deleteStudent($studentId);
}
