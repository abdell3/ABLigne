<?php

namespace App\Services;

use App\Repositories\EnrollmentRepository;
use Illuminate\Support\Facades\Auth;

class EnrollmentService
{
    /**
     * Create a new class instance.
     */

    protected $enrollmentRepository;


    public function __construct(EnrollmentRepository $enrollmentRepository)
    {
        $this->enrollmentRepository = $enrollmentRepository;
    }


    public function createEnrollment($courseId)
    {
        $data = [
            'user_id' => Auth::id(),
            'course_id' => $courseId,
            'status' => 'pending'
        ];

        return $this->enrollmentRepository->create($data);
    }

    public function updateEnrollment($enrollment, $status)
    {
        $enrollment = $this->enrollmentRepository->findById($enrollment);

        $user = Auth::user();
        

        if(!$user->hasRole('mentor') && !$user->hasRole('admin')){
            throw new \Exception('vous avez pas le droit de modifier');
        };


        return $this->enrollmentRepository->updateStatus($enrollment, $status);
    }


    public function getAllEnrollment()
    {
        return $this->enrollmentRepository->getAll();
    }

    public function enrollmentByCourse($courseId)
    {
        return $this->enrollmentRepository->getByCourse($courseId);
    }

    public function enrollmentByUser()
    {
        return $this->enrollmentRepository->getByUser(Auth::id());
    }


}
