<?php

namespace Database\Seeders;

use App\Models\ServiceAdvantage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceAdvantagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info_ar = '
            هي خدمة إلكترونية توفر عليك حدود
            الزمان في الحصول على الخدمات
            .المصرفية على مدار 24 ساعة يوميا
        ';

        $info_en = '
            It is an electronic service that saves you limits
            Time to get services
            Banking 24 hours a day
        ';

        // Service 1

        $advantage01['name'] = [
            'ar'            => 'استلام حوالة لغير العملاء',
            'en'            => 'Receipt of a transfer for non-customers'
        ];
        $advantage01['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $advantage01['service_id'] = 1;
        ServiceAdvantage::create($advantage01);


        $advantage02['name'] = [
            'ar'            => 'إيداع لحسابك',
            'en'            => 'Deposit to your account'
        ];
        $advantage02['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $advantage02['service_id'] = 1;
        ServiceAdvantage::create($advantage02);


        $advantage03['name'] = [
            'ar'            => 'سحب نقدي بدون بطاقتك',
            'en'            => 'Withdraw cash without your card'
        ];
        $advantage03['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $advantage03['service_id'] = 1;
        ServiceAdvantage::create($advantage03);


        // Service 2

        $advantage04['name'] = [
            'ar'            => 'استلام حوالة لغير العملاء',
            'en'            => 'Receipt of a transfer for non-customers'
        ];
        $advantage04['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $advantage04['service_id'] = 2;
        ServiceAdvantage::create($advantage04);


        $advantage05['name'] = [
            'ar'            => 'إيداع لحسابك',
            'en'            => 'Deposit to your account'
        ];
        $advantage05['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $advantage05['service_id'] = 2;
        ServiceAdvantage::create($advantage05);


        $advantage06['name'] = [
            'ar'            => 'سحب نقدي بدون بطاقتك',
            'en'            => 'Withdraw cash without your card'
        ];
        $advantage06['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $advantage06['service_id'] = 2;
        ServiceAdvantage::create($advantage06);

        // Service 3

        $advantage07['name'] = [
            'ar'            => 'استلام حوالة لغير العملاء',
            'en'            => 'Receipt of a transfer for non-customers'
        ];
        $advantage07['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $advantage07['service_id'] = 3;
        ServiceAdvantage::create($advantage07);


        $advantage08['name'] = [
            'ar'            => 'إيداع لحسابك',
            'en'            => 'Deposit to your account'
        ];
        $advantage08['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $advantage08['service_id'] = 3;
        ServiceAdvantage::create($advantage08);


        $advantage09['name'] = [
            'ar'            => 'سحب نقدي بدون بطاقتك',
            'en'            => 'Withdraw cash without your card'
        ];
        $advantage09['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $advantage09['service_id'] = 3;
        ServiceAdvantage::create($advantage09);

        // Service 4

        $advantage10['name'] = [
            'ar'            => 'استلام حوالة لغير العملاء',
            'en'            => 'Receipt of a transfer for non-customers'
        ];
        $advantage10['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $advantage10['service_id'] = 4;
        ServiceAdvantage::create($advantage10);


        $advantage11['name'] = [
            'ar'            => 'إيداع لحسابك',
            'en'            => 'Deposit to your account'
        ];
        $advantage11['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $advantage11['service_id'] = 4;
        ServiceAdvantage::create($advantage11);


        $advantage12['name'] = [
            'ar'            => 'سحب نقدي بدون بطاقتك',
            'en'            => 'Withdraw cash without your card'
        ];
        $advantage12['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $advantage12['service_id'] = 4;
        ServiceAdvantage::create($advantage12);

        // Service 5

        $advantage13['name'] = [
            'ar'            => 'استلام حوالة لغير العملاء',
            'en'            => 'Receipt of a transfer for non-customers'
        ];
        $advantage13['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $advantage13['service_id'] = 5;
        ServiceAdvantage::create($advantage13);


        $advantage14['name'] = [
            'ar'            => 'إيداع لحسابك',
            'en'            => 'Deposit to your account'
        ];
        $advantage14['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $advantage14['service_id'] = 5;
        ServiceAdvantage::create($advantage14);


        $advantage15['name'] = [
            'ar'            => 'سحب نقدي بدون بطاقتك',
            'en'            => 'Withdraw cash without your card'
        ];
        $advantage15['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $advantage15['service_id'] = 5;
        ServiceAdvantage::create($advantage15);
    }
}
