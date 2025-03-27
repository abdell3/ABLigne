<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions = [
            'create-course',
            'edit-course',
            'delete-course',
            'create-video',
            'edit-video',
            'delete-video',
            'view-enrollments',
            'update-enrollment', 
            'view-video',
            'view-course'
        ];

        foreach($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }


        $admin = Role::where('name', 'admin')->first();
        $admin->permissions()->attach(Permission::all());

        $mentor = Role::where('name', 'mentor')->first();
        $mentor->permissions()->attach(Permission::whereIn('name', [
            'create-course',
            'edit-course', 
            'delete_course', 
            'view-course', 
            'view-enrollments', 
            'view-statistique', 
            'create-video',
            'edit-video',
            'delete-video',
            'update-enrollment'
        ])->get());

        $student = Role::where('name', 'student')->first();
        $student->permissions()->attach(Permission::where('name', [
            'view-course', 
            'view-video'
        ])->get());
    }
}
