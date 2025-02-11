<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Arr;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat Role
        $admin = Role::create(['name' => 'admin']);
        $teacher = Role::create(['name' => 'teacher']);

        // Buat Permission
        $permissions = [
            'create post',
            'edit post',
            'delete post',
            'view post'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign permission ke role
        $admin->givePermissionTo($permissions);
        $teacher->givePermissionTo('view post');
    }
}
