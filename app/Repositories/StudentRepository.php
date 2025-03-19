<?php

namespace App\Repositories;

use App\Models\Student;
use App\Models\User;
use App\Repositories\Interfaces\StudentRepositoryInterface;

class StudentRepository implements StudentRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function getAllStudents()
    {
        return Student::with('user')->get();
    }

    public function getStudentById($studentId)
    {
        return Student::with('user')->findOrFail($studentId);
    }

    public function createStudent(array $studentDetails)
    {
        $user = User::create([
            'name' => $studentDetails['name'],
            'email' => $studentDetails['email'],
            'password' => bcrypt($studentDetails['password']),
        ]);

        $student = $user->student()->create([
            'level' => $studentDetails['level'],
        ]);

        return $student;
    }

    public function updateStudent($studentId, array $newDetails)
    {
        $student = Student::findOrFail($studentId);
        $user = $student->user;

        if (isset($newDetails['name'])) {
            $user->name = $newDetails['name'];
        }
        if (isset($newDetails['email'])) {
            $user->email = $newDetails['email'];
        }
        if (isset($newDetails['password'])) {
            $user->password = bcrypt($newDetails['password']);
        }
        $user->save();

        if (isset($newDetails['level'])) {
            $student->level = $newDetails['level'];
        }
        $student->save();

        return $student;
    }

    public function deleteStudent($studentId)
    {
        $student = Student::findOrFail($studentId);
        $student->user()->delete();
        $student->delete();

        return null;
    }
}
