<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'name' => 'admin',
            'display_name'  => 'website manager',
        ])->attachPermissions(['manage_website', 'admin_edit_user']);
        Role::create([
            'name' => 'admin_services',
            'display_name'  => 'services manager',
        ])->attachPermissions(['manage_services', 'admin_edit_user']);
        Role::create([
            'name' => 'admin_reports',
            'display_name'  => 'reports manager',
        ])->attachPermissions(['manage_reports', 'admin_edit_user']);
        Role::create([
            'name' => 'client',
            'display_name'  => 'website client',
        ])->attachPermissions(['edit_user', 'delete_user']);
    }
}
