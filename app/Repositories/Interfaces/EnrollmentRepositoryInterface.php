<?php

namespace App\Repositories\Interfaces;

use App\Models\Enrollment;

interface EnrollmentRepositoryInterface
{
    public function create(array $data);
    public function updateStatus(Enrollment $enrollment, string $status);
    public function findById(int $id);
    public function getAll();
    public function getByCourse(int $courseId);
    public function getByUser(int $userId);
}
