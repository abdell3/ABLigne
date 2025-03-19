<?php

namespace App\Services;

use App\Repositories\Interfaces\StudentRepositoryInterface;

class StudentService
{
    /**
     * Create a new class instance.
     */
    protected $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function getAllStudents()
    {
        return $this->studentRepository->getAllStudents();
    }

    public function getStudentById($studentId)
    {
        return $this->studentRepository->getStudentById($studentId);
    }

    public function createStudent(array $studentDetails)
    {
        return $this->studentRepository->createStudent($studentDetails);
    }

    public function updateStudent($studentId, array $newDetails)
    {
        return $this->studentRepository->updateStudent($studentId, $newDetails);
    }

    public function deleteStudent($studentId)
    {
        return $this->studentRepository->deleteStudent($studentId);
    }
}
