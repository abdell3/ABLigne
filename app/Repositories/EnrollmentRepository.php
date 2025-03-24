<?php

namespace App\Repositories;

use App\Models\Enrollment;
use App\Repositories\Interfaces\EnrollmentRepositoryInterface;

class EnrollmentRepository implements EnrollmentRepositoryInterface
{
    function create(array $data)
    {
        return Enrollment::create($data);
    }

    function updateStatus(Enrollment $enrollment, string $status)
    {
        $enrollment->update(['status' => $status]);
        return $enrollment;
    }

    function findById(int $id)
    {
        return Enrollment::findOrFail($id);
    }


    function getAll()
    {
        return Enrollment::all();
    }


    function getByCourse(int $courseId)
    {
        return Enrollment::where('course_id', $courseId)->get();
    }


    function getByUser(int $userId)
    {
        return Enrollment::where('user_id', $userId)->get();
    }
    
    
}
