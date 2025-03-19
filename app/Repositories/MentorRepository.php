<?php

namespace App\Repositories;

use App\Models\Mentor;
use App\Models\User;

class MentorRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function getAllMentors()
    {
        return Mentor::with('user')->get();
    }

    public function getMentorById($mentorId)
    {
        return Mentor::with('user')->findOrFail($mentorId);
    }

    public function createMentor(array $mentorDetails)
    {
        $user = User::create([
            'name' => $mentorDetails['name'],
            'email' => $mentorDetails['email'],
            'password' => bcrypt($mentorDetails['password']),
        ]);

        $mentor = $user->mentor()->create([
            'specialization' => $mentorDetails['specialization'],
        ]);

        return $mentor;
    }

    public function updateMentor($mentorId, array $newDetails)
    {
        $mentor = Mentor::findOrFail($mentorId);
        $user = $mentor->user;

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

        if (isset($newDetails['specialization'])) {
            $mentor->specialization = $newDetails['specialization'];
        }
        $mentor->save();

        return $mentor;
    }

    public function deleteMentor($mentorId)
    {
        $mentor = Mentor::findOrFail($mentorId);
        $mentor->user()->delete();
        $mentor->delete();

        return null;
    }
}
