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

        $role = Role::create(['name' => 'SuperUser']);
        $role->givePermissionTo('Administer roles & permissions');
        $role->givePermissionTo('samples_all');
        $role->givePermissionTo('samples_browse_list');
        $role->givePermissionTo('samples_read_show');
        $role->givePermissionTo('samples_edit_update');
        $role->givePermissionTo('samples_add_create');
        $role->givePermissionTo('samples_delete_destroy');

        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo('Administer roles & permissions');
        $role->givePermissionTo('samples_all');
        $role->givePermissionTo('samples_browse_list');
        $role->givePermissionTo('samples_read_show');
        $role->givePermissionTo('samples_edit_update');
        $role->givePermissionTo('samples_add_create');
        $role->givePermissionTo('samples_delete_destroy');

        $role = Role::create(['name' => 'CEO']);
        $role->givePermissionTo('Administer roles & permissions');

        $role = Role::create(['name' => 'Executive']);
        $role->givePermissionTo('Administer roles & permissions');

        $role = Role::create(['name' => 'Manager']);
        $role->givePermissionTo('Administer roles & permissions');

        $role = Role::create(['name' => 'Supervisor']);
        $role->givePermissionTo('Administer roles & permissions');

        $role = Role::create(['name' => 'Employee']);
        $role->givePermissionTo('Administer roles & permissions');

        $role = Role::create(['name' => 'Contractor']);
        $role->givePermissionTo('Administer roles & permissions');

        $role = Role::create(['name' => 'Visitor']);
        $role->givePermissionTo('frontend_reader');
    }
}
