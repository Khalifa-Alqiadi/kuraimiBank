<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ExchangeRate;

class ExchangeRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ExchangeRate01['name'] = [
            'ar' => 'دولار امريكي',
            'en' => 'American dollar',
        ];
        $ExchangeRate01['sale'] = '600';
        $ExchangeRate01['buy'] = '550';
        ExchangeRate::create($ExchangeRate01);

        $ExchangeRate02['name'] = [
            'ar' => 'ريال سعودي',
            'en' => 'SAR',
        ];
        $ExchangeRate02['sale'] = '148';
        $ExchangeRate02['buy'] = '150';
        ExchangeRate::create($ExchangeRate02);

        $ExchangeRate03['name'] = [
            'ar' => 'يورو',
            'en' => 'Yuro',
        ];
        $ExchangeRate03['sale'] = '550';
        $ExchangeRate03['buy'] = '550';
        ExchangeRate::create($ExchangeRate03);
    }
}
