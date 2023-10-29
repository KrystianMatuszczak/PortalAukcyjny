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
        Permission::create(['name' => 'products.index']);
        Permission::create(['name' => 'products.manage']);
        Permission::create(['name' => 'categories.index']);
        Permission::create(['name' => 'categories.manage']);
        $adminRole = Role::findByName(config('auth.roles.admin'));
        $workerRole = Role::findByName(config('auth.roles.worker'));
        $adminRole->givePermissionTo('users.index');
        $adminRole->givePermissionTo('products.index');
        $adminRole->givePermissionTo('products.manage');
        $adminRole->givePermissionTo('categories.index');
        $adminRole->givePermissionTo('categories.manage');
        $adminRole->givePermissionTo('users.change_role');
        $workerRole->givePermissionTo('users.index');
    }
}
