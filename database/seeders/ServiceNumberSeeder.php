<?php

namespace Database\Seeders;

use App\Models\ServiceNumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info_ar = 'تمويل عقاري تم تمويله تمويلا شاملا';
        $info_en = 'Fully financed real estate';

        $serviceNumber01['numbers'] = '889';
        $serviceNumber01['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        ServiceNumber::create($serviceNumber01);


        $serviceNumber02['numbers'] = '899';
        $serviceNumber02['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        ServiceNumber::create($serviceNumber02);


        $serviceNumber03['numbers'] = '1089';
        $serviceNumber03['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        ServiceNumber::create($serviceNumber03);


        $serviceNumber04['numbers'] = '879';
        $serviceNumber04['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        ServiceNumber::create($serviceNumber04);


        $serviceNumber05['numbers'] = '2000';
        $serviceNumber05['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        ServiceNumber::create($serviceNumber05);


        $serviceNumber06['numbers'] = '899';
        $serviceNumber06['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        ServiceNumber::create($serviceNumber06);


        $serviceNumber07['numbers'] = '559';
        $serviceNumber07['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        ServiceNumber::create($serviceNumber07);


        $serviceNumber08['numbers'] = '899';
        $serviceNumber08['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        ServiceNumber::create($serviceNumber08);
    }
}
