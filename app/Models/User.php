<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [];
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function permissions()
    {
        return $this->roles->map()->permissions->flatten()->unique();
    }

    public function hasRole($role)
    {
        return $this->roles()->where('user_role', $role)->exists();
    }
    public function hasPermission($permission)
    {
        return $this->permissions()->contains('name', $permission);
    }


    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function mentor()
    {
        return $this->hasOne(Mentor::class);
    }


    public function profile()
    {
        if($this->hasRole('student'))
        {
            return $this->student;
        }
        elseif($this->hasRole('mentor'))
        {
            return $this->mentor;
        }


        return null;
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }




}
