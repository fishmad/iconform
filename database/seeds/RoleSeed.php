<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo('Administer roles & permissions');
				$role->givePermissionTo('samples_all');
				$role->givePermissionTo('samples_browse_list');
				$role->givePermissionTo('samples_read_show');
				$role->givePermissionTo('samples_edit_update');
				$role->givePermissionTo('samples_add_create');
        $role->givePermissionTo('samples_delete_destroy');
        
        $role = Role::create(['name' => 'guest']);
        $role->givePermissionTo('frontend_reader');
    }
}
