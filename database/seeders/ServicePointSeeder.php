<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServicePoint;
class ServicePointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServicePoint::create([
            'name' => [
                'ar' => 'شارع عشرين',
                'en' => '20th St. Branch'
            ],
            'address' => [
                'ar' => 'شارع عشرين تقاطع ش 20 مع ش 16',
                'en' => "Sana'a 60th st.- the entrance Senynh"
            ],
            'working_hours' => [
                'ar' => 'من 8:00 صباحاً وحتى 1:30 ظهراً و من 3:30 عصراً حتى 8:00 مساءً',
                'en' => 'From 8:00 AM TO 1:30 PM AND From 3.30 PM TO 8.00'

            ],
            'phone'        => '01576943',
            'second_phone' => '01576043',
            'city_id'      => 1
        ]);

        ServicePoint::create([
            'name' => [
                'ar' => 'شارع الستين',
                'en' => '20th St. Branch'
            ],
            'address' => [
                'ar' => 'شارع عشرين تقاطع ش 20 مع ش 16',
                'en' => "Sana'a 60th st.- the entrance Senynh"
            ],
            'working_hours' => [
                'ar' => 'من 8:00 صباحاً وحتى 1:30 ظهراً و من 3:30 عصراً حتى 8:00 مساءً',
                'en' => 'From 8:00 AM TO 1:30 PM AND From 3.30 PM TO 8.00'

            ],
            'phone'        => '01576943',
            'second_phone' => '01579943',
            'city_id'      => 1
        ]);
    }
}
