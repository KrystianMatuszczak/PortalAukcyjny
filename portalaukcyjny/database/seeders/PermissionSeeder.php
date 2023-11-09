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
        Permission::create(['name' => 'conditions.index']);
        Permission::create(['name' => 'conditions.manage']);
        Permission::create(['name' => 'shipments.index']);
        Permission::create(['name' => 'shipments.manage']);
        $adminRole = Role::findByName(config('auth.roles.admin'));
        $workerRole = Role::findByName(config('auth.roles.worker'));
        $userRole = Role::findByName(config('auth.roles.user'));
        $adminRole->givePermissionTo('users.index');
        $adminRole->givePermissionTo('products.index');
        $adminRole->givePermissionTo('products.manage');
        $adminRole->givePermissionTo('categories.index');
        $adminRole->givePermissionTo('categories.manage');
        $adminRole->givePermissionTo('conditions.index');
        $adminRole->givePermissionTo('conditions.manage');
        $adminRole->givePermissionTo('shipments.index');
        $adminRole->givePermissionTo('shipments.manage');
        $adminRole->givePermissionTo('users.change_role');
        $workerRole->givePermissionTo('users.index');
        $userRole->givePermissionTo('categories.index');
        $userRole->givePermissionTo('products.index');
    }
}
