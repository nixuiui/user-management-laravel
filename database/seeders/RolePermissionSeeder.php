<?php

namespace Database\Seeders;

use App\Models\RolePermission;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 1
        ]);
        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 2
        ]);
        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 3
        ]);
        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 4
        ]);
        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 5
        ]);
        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 6
        ]);
        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 7
        ]);
        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 8
        ]);
        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 9
        ]);
        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 10
        ]);
    }
}
