<?php

namespace App\Repositories\Interfaces;

interface MentorRepositoryInterface
{
    public function getAllMentors();
    public function getMentorById($mentorId);
    public function createMentor(array $mentorDetails);
    public function updateMentor($mentorId, array $newDetails);
    public function deleteMentor($mentorId);
}
