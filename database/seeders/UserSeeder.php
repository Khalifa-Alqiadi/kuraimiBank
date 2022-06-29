<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'first_name'        => 'khalifa',
            'Last_name'         => 'alqiadi',
            'email'             => 'admin@gmail.com',
            'password'          => Hash::make('123123123'),
            'gender'            => 1,
            'address'           => 'Adel Street',
            'phone'             => '738843852',
        ])->attachRole('admin')->attachPermissions(['manage_website', 'admin_edit_user']);
        User::create([
            'first_name'        => 'admin',
            'Last_name'         => 'services',
            'email'             => 'admin.services@gmail.com',
            'password'          => Hash::make('123123123'),
            'gender'            => 1,
            'address'           => 'Adel Street',
            'phone'             => '738843852',
        ])->attachRole('admin_services')->attachPermissions(['manage_services', 'admin_edit_user']);
        User::create([
            'first_name'        => 'khalifa',
            'Last_name'         => 'alqiadi',
            'email'             => 'khalifa@gmail.com',
            'password'          => Hash::make('123123123'),
            'gender'            => 1,
            'address'           => 'Adel Street',
            'phone'             => '738843852',
        ])->attachRole('client')->attachPermissions(['edit_user', 'delete_user']);
        User::create([
            'first_name'        => 'admin',
            'Last_name'         => 'reports',
            'email'             => 'admin.reports@gmail.com',
            'password'          => Hash::make('123123123'),
            'gender'            => 1,
            'address'           => 'Adel Street',
            'phone'             => '738843852',
        ])->attachRole('admin_reports')->attachPermissions(['manage_reports', 'admin_edit_user']);
    }
}
