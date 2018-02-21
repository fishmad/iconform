<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Administer roles & permissions', 'label' => 'Administer roles & permissions', 'item_order' => 1, 'groupings' => 'Gates & Policies', 'groupings_order' => 1]);
        Permission::create(['name' => 'frontend_reader', 'label' => 'Front-end Reader', 'item_order' => 2, 'groupings' => 'Basic', 'groupings_order' => 1]);
        Permission::create(['name' => 'samples_all', 'label' => 'samples.all', 'item_order' => 3, 'groupings' => 'Sampling', 'groupings_order' => 1]);
        Permission::create(['name' => 'samples_browse_list', 'label' => 'samples.browse.list', 'item_order' => 3, 'groupings' => 'Sampling', 'groupings_order' => 2]);
        Permission::create(['name' => 'samples_read_show', 'label' => 'samples.read.show', 'item_order' => 3, 'groupings' => 'Sampling', 'groupings_order' => 3]);
        Permission::create(['name' => 'samples_edit_update', 'label' => 'samples.edit.update', 'item_order' => 3, 'groupings' => 'Sampling', 'groupings_order' => 4]);
        Permission::create(['name' => 'samples_add_create', 'label' => 'samples.add.create', 'item_order' => 3, 'groupings' => 'Sampling', 'groupings_order' => 5]);
        Permission::create(['name' => 'samples_delete_destroy', 'label' => 'samples.delete.destroy', 'item_order' => 3, 'groupings' => 'Sampling', 'groupings_order' => 6]);
    }
}





/**
Permission belongs in groupings
------------------------------
Groupings_order				1
Groupings							Samples

Permission Action			browse|read|edit|add|delete|all
Permission Label			Browse
Permission Name				samples_browse


samples_all
samples_browse_list
samples_read_show
samples_edit_update
samples_add_create
samples_delete_destroy
*/