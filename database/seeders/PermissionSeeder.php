<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Permission::create([
            'name' => 'User - Create',
            'key' => 'user_create',
        ]);
        Permission::create([
            'name' => 'User - Read',
            'key' => 'user_read',
        ]);
        Permission::create([
            'name' => 'User - Update',
            'key' => 'user_update',
        ]);
        Permission::create([
            'name' => 'User - Delete',
            'key' => 'user_delete',
        ]);
        Permission::create([
            'name' => 'User - View Deleted User',
            'key' => 'user_view_deleted',
        ]);
        Permission::create([
            'name' => 'Role - Create',
            'key' => 'role_create',
        ]);
        Permission::create([
            'name' => 'Role - Read',
            'key' => 'role_read',
        ]);
        Permission::create([
            'name' => 'Role - Update',
            'key' => 'role_update',
        ]);
        Permission::create([
            'name' => 'Role - Delete',
            'key' => 'role_delete',
        ]);
        Permission::create([
            'name' => 'Repository - Read',
            'key' => 'repository_read',
        ]);
    }
}
