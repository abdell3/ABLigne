<?php

namespace App\Services;

use App\Repositories\Interfaces\MentorRepositoryInterface;

class MentorService
{
    /**
     * Create a new class instance.
     */
    protected $mentorRepository;

    public function __construct(MentorRepositoryInterface $mentorRepository)
    {
        $this->mentorRepository = $mentorRepository;
    }

    public function getAllMentors()
    {
        return $this->mentorRepository->getAllMentors();
    }

    public function getMentorById($mentorId)
    {
        return $this->mentorRepository->getMentorById($mentorId);
    }

    public function createMentor(array $mentorDetails)
    {
        return $this->mentorRepository->createMentor($mentorDetails);
    }

    public function updateMentor($mentorId, array $newDetails)
    {
        return $this->mentorRepository->updateMentor($mentorId, $newDetails);
    }

    public function deleteMentor($mentorId)
    {
        return $this->mentorRepository->deleteMentor($mentorId);
    }
}
