<?php

namespace App\Repositories\Interfaces;

use App\Models\Badge;
use App\Models\User;

interface BadgeRepositoryInterface
{
    public function all();
    public function find($id);
    public function create($data);
    public function update(Badge $badge, $data);
    public function delete(Badge $badge);
    
   
    public function getBadgesForUser(User $user);
    public function userHasBadge(User $user, $badgeId);
    public function awardBadgeToUser(User $user, $badgeId);
    public function getBadgesByType($type);
}
