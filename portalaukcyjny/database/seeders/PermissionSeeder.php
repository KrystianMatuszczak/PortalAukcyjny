<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{

    public function run(): void
    {
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.change_role']);
        $adminRole = Role::findByName(config('auth.roles.admin'));
        $workerRole = Role::findByName(config('auth.roles.worker'));
        $adminRole->givePermissionTo('users.index');
        $adminRole->givePermissionTo('users.change_role');
        $workerRole->givePermissionTo('users.index');
    }
}
