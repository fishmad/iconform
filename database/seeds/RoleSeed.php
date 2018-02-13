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
				$role->givePermissionTo('sample_browse');
				$role->givePermissionTo('sample_read');
				$role->givePermissionTo('sample_edit');
				$role->givePermissionTo('sample_add');
				$role->givePermissionTo('sample_delete');
				
        $role = Role::create(['name' => 'guest']);
        $role->givePermissionTo('frontend_reader');
    }
}
