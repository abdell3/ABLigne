<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function ($user) {
            if ($user->mentor) {
                $user->roles()->attach(Role::where('name', 'mentor')->first());
            } elseif ($user->student) {
                $user->roles()->attach(Role::where('name', 'student')->first());
            } else {
                $user->roles()->attach(Role::where('name', 'admin')->first());
            }
        });
    }
}
