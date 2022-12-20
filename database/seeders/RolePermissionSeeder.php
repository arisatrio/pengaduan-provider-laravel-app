<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ROLE
        $roles = [
            'Super User'
        ];

        $superUserRole = Role::create([
            'name'  => 'Super User'
        ]);

        // PERMISSION
        $actions = ['Index', 'Create', 'Show', 'Edit', 'Delete'];
        $permissions = [
            'User',
            'Role',
            'Permission'
        ];

        foreach($permissions as $p) {
            foreach($actions as $act) {
                $perm = Permission::create([
                    'name'  => $act.' '.$p,
                ]);

                $perm->assignRole($superUserRole);
            }
        }
    }
}
