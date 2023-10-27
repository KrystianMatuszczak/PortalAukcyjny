<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@localhost',
            'password' => Hash::make('12345678'),
        ]);
        $adminRole = Role::findByName(config('auth.roles.admin'));
        if(isset($adminRole))
        {
            $admin->assignRole($adminRole);
        }
        $worker = User::create([
            'name' => 'Worker',
            'email' => 'worker@localhost',
            'password' => Hash::make('12345678'),
        ]);
        $workerRole = Role::findByName(config('auth.roles.worker'));
        if(isset($workerRole))
        {
            $worker->assignRole($workerRole);
        }
        $user = User::create([
            'name' => 'User',
            'email' => 'User@localhost',
            'password' => Hash::make('12345678'),
        ]);
        $userRole = Role::findByName(config('auth.roles.user'));
        if(isset($userRole))
        {
            $user->assignRole($userRole);
        }
    }
    
}
