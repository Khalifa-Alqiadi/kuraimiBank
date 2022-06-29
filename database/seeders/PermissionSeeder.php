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
    }
}
