<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $user = Role::firstOrCreate(['name' => 'user']);

        // Assign permissions to roles
        $admin->givePermissionTo($permissions);
        $user->givePermissionTo([ 'create courses','edit courses', 'delete courses', 'view courses','buy courses']);
        
         $adminUser = User::firstOrCreate(
            ['email' => 'admin@learnerplanet.com'],
            [
                'first_name' => 'admin',
                'last_name' => 'admin',
                'password' => Hash::make('learnerplanet.@1234'),
            ]
        );

        $adminUser->assignRole($admin);
    }
}
