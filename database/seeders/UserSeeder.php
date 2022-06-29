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
        ])->attachRole('admin')->attachPermission('manage_website');
        User::create([
            'first_name'        => 'khalifa',
            'Last_name'         => 'alqiadi',
            'email'             => 'khalifa@gmail.com',
            'password'          => Hash::make('123123123'),
            'gender'            => 1,
            'address'           => 'Adel Street',
            'phone'             => '738843852',
        ])->attachRole('client')->attachPermissions(['edit_user', 'delete_user', 'add_skille', 'edit_skille']);
        User::create([
            'first_name'        => 'naif',
            'Last_name'         => 'samer',
            'email'             => 'naif@gmail.com',
            'password'          => Hash::make('123123123'),
            'gender'            => 1,
            'address'           => 'Adel Street',
            'phone'             => '738843852',
        ])->attachRole('client')->attachPermission('edit_user');
    }
}
