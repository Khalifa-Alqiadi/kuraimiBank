<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => [
                'ar' => 'اليمن',
                'en' => 'Yemen'
            ]
        ]);

        Country::create([
            'name' => [
                'ar' => 'السعودية',
                'en' => 'Saudi Arabia'
            ]
        ]);

        Country::create([
            'name' => [
                'ar' => 'الكويت',
                'en' => 'Kuwait'
            ]
        ]);
    }
}
