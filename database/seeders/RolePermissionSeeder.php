<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();

        $admin = Role::whereName('Admin')->first();
        foreach ($permissions as $permission) {
            DB::table('role_permission')->insert([
                'role_id' => $admin->id,
                'permission_id' => $permission->id,
            ]);
        }

        $managerRoles = [
            'view_equipment',
            'move_in_storages',
            'view_storages',
        ];

        $manager = Role::whereName('Manager')->first();
        foreach ($permissions as $permission) {
            if (in_array($permission->name, $managerRoles)) {
                DB::table('role_permission')->insert([
                    'role_id' => $manager->id,
                    'permission_id' => $permission->id,
                ]);
            }
        }

        $distributorRoles = [
            'view_equipment',
            'edit_equipment',
        ];

        $distributor = Role::whereName('Distributor')->first();
        foreach ($permissions as $permission) {
            if (in_array($permission->name, $distributorRoles)) {
                DB::table('role_permission')->insert([
                    'role_id' => $distributor->id,
                    'permission_id' => $permission->id,
                ]);
            };
        }
    }
}
