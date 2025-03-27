<?php

namespace App\Repositories;

use App\Models\Badge;
use App\Models\User;
use App\Repositories\Interfaces\BadgeRepositoryInterface;

class BadgeRepository implements BadgeRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    

     function all()
     {
        return Badge::with('conditions')->get();
     }

     function find($id)
     {
        return Badge::with('conditions')->find($id);
     }


     function getBadgesForUser(User $user)
     {
        return $user->badges()
            ->with('conditions')
            ->get();
     }

     function userHasBadge(User $user, $badgeId)
     {
        return $user->badges()
            ->where('badges.id', $badgeId)
            ->exists();
     }


     function awardBadgeToUser(User $user, $badgeId)
     {
        if (!$this->userHasBadge($user, $badgeId)) {
            $user->badges() 
                ->attach($badgeId, ['earned_at' => now()]);
        }
     }
     
     function getBadgesByType($type)
     {
        return Badge::where('type', $type)
            ->with('conditions')
            ->get();
     }


     function create($data)
     {
        return Badge::create($data);
     }


     function delete(Badge $badge)
     {
        return $badge->delete();
     }


     function update(Badge $badge, $data)
     {
        return $badge->update($data);
     }





}
