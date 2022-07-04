<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //
        Permission::create([
            'name'          => 'manage_website',
            'display_name'  => 'Management All Operation',
        ]);
        Permission::create([
            'name'          => 'admin_edit_user',
            'display_name'  => 'Management har Acount',
        ]);
        Permission::create([
            'name'          => 'manage_services',
            'display_name'  => 'Management services',
        ]);
        Permission::create([
            'name'          => 'manage_reports',
            'display_name'  => 'Management reports',
        ]);
        Permission::create([
            'name'          => 'edit_user',
            'display_name'  => 'Edit User',
        ]);
        Permission::create([
            'name'          => 'delete_user',
            'display_name'  => 'Delete User',
        ]);
        Permission::create([
            'name'          => 'Add_Category',
            'display_name'  => 'Add Category',
        ]);
        Permission::create([
            'name'          => 'Edit_Category',
            'display_name'  => 'Edit Category',
        ]);
        Permission::create([
            'name'          => 'Delete_Category',
            'display_name'  => 'Delete Category',
        ]);
        Permission::create([
            'name'          => 'Status_Category',
            'display_name'  => 'Status Category',
        ]);
        Permission::create([
            'name'          => 'Add_Country',
            'display_name'  => 'Add Country',
        ]);
        Permission::create([
            'name'          => 'Edit_Country',
            'display_name'  => 'Edit Country',
        ]);
        Permission::create([
            'name'          => 'Delete_Country',
            'display_name'  => 'Delete Country',
        ]);
        Permission::create([
            'name'          => 'Status_Country',
            'display_name'  => 'Status Country',
        ]);
    }
}
