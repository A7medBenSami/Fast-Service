<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list addresses']);
        Permission::create(['name' => 'view addresses']);
        Permission::create(['name' => 'create addresses']);
        Permission::create(['name' => 'update addresses']);
        Permission::create(['name' => 'delete addresses']);

        Permission::create(['name' => 'list arrives']);
        Permission::create(['name' => 'view arrives']);
        Permission::create(['name' => 'create arrives']);
        Permission::create(['name' => 'update arrives']);
        Permission::create(['name' => 'delete arrives']);

        Permission::create(['name' => 'list captains']);
        Permission::create(['name' => 'view captains']);
        Permission::create(['name' => 'create captains']);
        Permission::create(['name' => 'update captains']);
        Permission::create(['name' => 'delete captains']);

        Permission::create(['name' => 'list categories']);
        Permission::create(['name' => 'view categories']);
        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'update categories']);
        Permission::create(['name' => 'delete categories']);

        Permission::create(['name' => 'list histories']);
        Permission::create(['name' => 'view histories']);
        Permission::create(['name' => 'create histories']);
        Permission::create(['name' => 'update histories']);
        Permission::create(['name' => 'delete histories']);

        Permission::create(['name' => 'list locations']);
        Permission::create(['name' => 'view locations']);
        Permission::create(['name' => 'create locations']);
        Permission::create(['name' => 'update locations']);
        Permission::create(['name' => 'delete locations']);

        Permission::create(['name' => 'list messages']);
        Permission::create(['name' => 'view messages']);
        Permission::create(['name' => 'create messages']);
        Permission::create(['name' => 'update messages']);
        Permission::create(['name' => 'delete messages']);

        Permission::create(['name' => 'list allourdata']);
        Permission::create(['name' => 'view allourdata']);
        Permission::create(['name' => 'create allourdata']);
        Permission::create(['name' => 'update allourdata']);
        Permission::create(['name' => 'delete allourdata']);

        Permission::create(['name' => 'list profiles']);
        Permission::create(['name' => 'view profiles']);
        Permission::create(['name' => 'create profiles']);
        Permission::create(['name' => 'update profiles']);
        Permission::create(['name' => 'delete profiles']);

        Permission::create(['name' => 'list allreceiverdata']);
        Permission::create(['name' => 'view allreceiverdata']);
        Permission::create(['name' => 'create allreceiverdata']);
        Permission::create(['name' => 'update allreceiverdata']);
        Permission::create(['name' => 'delete allreceiverdata']);

        Permission::create(['name' => 'list allsenderdata']);
        Permission::create(['name' => 'view allsenderdata']);
        Permission::create(['name' => 'create allsenderdata']);
        Permission::create(['name' => 'update allsenderdata']);
        Permission::create(['name' => 'delete allsenderdata']);

        Permission::create(['name' => 'list shipments']);
        Permission::create(['name' => 'view shipments']);
        Permission::create(['name' => 'create shipments']);
        Permission::create(['name' => 'update shipments']);
        Permission::create(['name' => 'delete shipments']);

        Permission::create(['name' => 'list vehicles']);
        Permission::create(['name' => 'view vehicles']);
        Permission::create(['name' => 'create vehicles']);
        Permission::create(['name' => 'update vehicles']);
        Permission::create(['name' => 'delete vehicles']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
