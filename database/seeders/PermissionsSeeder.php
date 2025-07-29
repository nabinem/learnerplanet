<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'create courses',
            'edit courses',
            'delete courses',
            'view courses',
            'buy courses',
            'delete users'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

               // Create roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $teacher = Role::firstOrCreate(['name' => 'teacher']);
        $user = Role::firstOrCreate(['name' => 'user']);

        // Assign permissions to roles
        $admin->givePermissionTo($permissions);
        $teacher->givePermissionTo([ 'create courses','edit courses', 'delete courses', 'view courses','buy courses']);
        $user->givePermissionTo(['buy courses', 'view courses']);
    }
}
