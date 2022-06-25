<?php

namespace Database\Seeders;
use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name' => [
                'ar' => 'صنعاء',
                'en' => 'Sanaa'
            ],
            'country_id' => 1
        ]);

        City::create([
            'name' => [
                'ar' => 'الحديده',
                'en' => 'Hodeidah'
            ],
            'country_id' => 1
        ]);
    }
}
