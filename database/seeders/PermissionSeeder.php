<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create_course']);
        Permission::create(['name' => 'delete_course']);
        Permission::create(['name' => 'edit_course']);
        Permission::create(['name' => 'view_course']);

        
    }
}
