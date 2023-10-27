<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::create(['name' => config('auth.roles.admin')]);
        $worker = Role::create(['name' => config('auth.roles.worker')]);
        $user = Role::create(['name' => config('auth.roles.user')]);
    }
}
