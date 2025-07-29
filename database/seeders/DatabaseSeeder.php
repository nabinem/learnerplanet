<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $email = 'admin@learnerplanet.com';
        $password = 'admin@lp0923';

        $this->command->info("------ Creating Default Admin User: {$email} {$password} \n");

        \App\Models\User::firstOrCreate(
            [
                'email' =>  $email,
            ],
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => $email,
                'password' => Hash::make($password),
                'role' => 'admin'
            ]
        );
        
        $this->call([
            PermissionsSeeder::class,
            RolesSeeder::class,
            CategorySeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
