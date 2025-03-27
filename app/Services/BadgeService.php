<?php

namespace App\Services;

use App\Models\Badge;
use App\Models\User;
use App\Repositories\BadgeRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BadgeService
{
    /**
     * Create a new class instance.
     */
    
    protected $badgeRepository;
    
    public function __construct(BadgeRepository $badgeRepository)
    {
        $this->badgeRepository = $badgeRepository;
    }


    public function checkAwardBadges(User $user): void
    {
        $badges = $this->badgeRepository->getBadgesByType(
            $user->hasRole('student') ? 'student' : 'mentor'
        );
    
        foreach ($badges as $badge) {
            if ($this->conditions($user, $badge)) {
                $this->awardBadge($user, $badge);
            }
        }
    }


    private function conditions(User $user, Badge $badge)
    {
        foreach ($badge->conditions as $condition ) {
            $method = $condition->methode_name;

            $requiredValue = $condition->pivot->required_value;
            
            if (!method_exists($this, $method)) {
                continue;
            }

            if (!$this->{$method}($user, $requiredValue)) {
                return false;
            }
        }
        return true;
    }


    private function awardBadge(User $user, Badge $badge)
    {
        $this->badgeRepository->awardBadgeToUser($user, $badge->id);

        $this->badgeRepository->awardBadgeToUser($user, $badge);
    }

    private function checkCourseCompletion(User $user, int $courseId)
    {
        return $user->completedCourses()
            ->where('course_id', $courseId)
            ->where('progress', 100)
            ->exists();
    }

    
    
    private function checkFollowedCoursesCount(User $user, int $requiredCount): bool
    {
        return $user->enrollments()->count() >= $requiredCount;
    }



    // private function badgeNotif(User $user, Badge $badge): void
    // {
        
        
    //     $user->notify(new NewBadgeEarned($badge));
        
        
        
    // }


    private function checkProfileCompletion(User $user, bool $required)
    {
        return $user->profile_completed === $required;
    }




    private function checkCreatedCoursesCount(User $mentor, int $requiredCount): bool
    {
        return $mentor->courses()->count() >= $requiredCount;
    }


    private function checkAccountAge(User $user, int $requiredMonths): bool
    {
        return $user->created_at->diffInMonths(now()) >= $requiredMonths;
    }




       

}
