<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            ['name' => 'view_equipment'],
            ['name' => 'edit_equipment'],
            ['name' => 'move_in_storages'],
            ['name' => 'view_storages'],
            ['name' => 'edit_storages'],
            ['name' => 'view_roles'],
            ['name' => 'edit_roles'],
            ['name' => 'view_users'],
            ['name' => 'edit_users']
        ]);
    }
}
