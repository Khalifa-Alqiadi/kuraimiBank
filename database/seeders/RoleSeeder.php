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
        ]);
        Role::create([
            'name' => 'admin_services',
            'display_name'  => 'services manager',
        ]);
        Role::create([
            'name' => 'admin_reports',
            'display_name'  => 'reports manager',
        ]);
        Role::create([
            'name' => 'client',
            'display_name'  => 'website client',
        ]);
    }
}
