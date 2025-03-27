<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    /** @use HasFactory<\Database\Factories\BadgeFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'logo',
        'user',
        'conditions' => 'array',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_badge')
            ->withTimestamps()
            ->withPivot('earned_at');
    }

    public function conditions()
    {
        return $this->belongsToMany(Condition::class)
            ->withPivot('required_value');
    }

}
