<?php

namespace Database\Seeders;

use App\Models\ServiceSlider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info_ar = '
            <p>
            السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر الإسلامي
            على مدار الساعة وطوال أيام الأسبوع  
            </p>
            <p>
            مكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
            بطاقة
            </p>
            <p>
            يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
            </p>
            <p>إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي</p>
            <p>
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
            </p>
            <p>تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي</p>
            <p>الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك</p>
            <p>طلب كشف حساب مختصر او الاستعلام عن الرصيد</p>
        ';

        $info_en = '
            <p>
                Free withdrawals through the ATM network of Al-Kuraimi Islamic Microfinance Bank
                24 hours a day, 7 days a week
            </p> 
            <p>
                The possibility of withdrawing and receiving remittances directly through the ATM service and without any
                Card
            </p> 
            <p>The customer can deposit his money transfer directly to his account through the automated teller machine</p> 
            <p>The possibility of transferring to any account in Al-Kuraimi Bank for Islamic Microfinance</p> 
            <p>
                SabaFon - landline payment - Y - YOU - Yemen mobile payment) utility bill payment
                (electricity bills - water bills - adsl internet viber
            </p> 
            <p>Change the password at the ATMs of an Islamic microfinance bank</p> 
            <p>Deposit cash to the account at ATMs that support it</p> 
            <p>Request a short statement of account or inquire about the balance</p> 
        ';

        $sliderService01['title'] = [
            'ar'            => 'المميزات',
            'en'            => 'Advantages'
        ];
        $sliderService01['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService01['image'] = 'Group -51.png';
        $sliderService01['service_id'] = 1;
        ServiceSlider::create($sliderService01);



        $sliderService02['title'] = [
            'ar'            => ' الشروط',
            'en'            => 'Conditions'
        ];
        $sliderService02['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService02['image'] = 'Group 457.png';
        $sliderService02['service_id'] = 1;
        ServiceSlider::create($sliderService02);



        $sliderService03['title'] = [
            'ar'            => 'الاشتراك',
            'en'            => 'Subscription'
        ];
        $sliderService03['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService03['image'] = 'news.png';
        $sliderService03['service_id'] = 1;
        ServiceSlider::create($sliderService03);



        $sliderService04['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService04['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService04['image'] = 'wan-san-yip-ID-4.png';
        $sliderService04['service_id'] = 1;
        ServiceSlider::create($sliderService04);

        // Service 2

        $sliderService05['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService05['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService05['image'] = 'wan-san-yip-ID-4.png';
        $sliderService05['service_id'] = 2;
        ServiceSlider::create($sliderService05);


        $sliderService06['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService06['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService06['image'] = 'wan-san-yip-ID-4.png';
        $sliderService06['service_id'] = 2;
        ServiceSlider::create($sliderService06);


        $sliderService07['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService07['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService07['image'] = 'wan-san-yip-ID-4.png';
        $sliderService07['service_id'] = 2;
        ServiceSlider::create($sliderService07);


        $sliderService08['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService08['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService08['image'] = 'wan-san-yip-ID-4.png';
        $sliderService08['service_id'] = 2;
        ServiceSlider::create($sliderService08);

        // service 3

        $sliderService09['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService09['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService09['image'] = 'wan-san-yip-ID-4.png';
        $sliderService09['service_id'] = 3;
        ServiceSlider::create($sliderService09);



        $sliderService10['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService10['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService10['image'] = 'wan-san-yip-ID-4.png';
        $sliderService10['service_id'] = 3;
        ServiceSlider::create($sliderService10);



        $sliderService11['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService11['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService11['image'] = 'wan-san-yip-ID-4.png';
        $sliderService11['service_id'] = 3;
        ServiceSlider::create($sliderService11);



        $sliderService12['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService12['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService12['image'] = 'wan-san-yip-ID-4.png';
        $sliderService12['service_id'] = 3;
        ServiceSlider::create($sliderService12);

        // Service 4

        $sliderService13['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService13['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService13['image'] = 'wan-san-yip-ID-4.png';
        $sliderService13['service_id'] = 4;
        ServiceSlider::create($sliderService13);



        $sliderService14['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService14['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService14['image'] = 'wan-san-yip-ID-4.png';
        $sliderService14['service_id'] = 4;
        ServiceSlider::create($sliderService14);



        $sliderService15['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService15['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService15['image'] = 'wan-san-yip-ID-4.png';
        $sliderService15['service_id'] = 4;
        ServiceSlider::create($sliderService15);



        $sliderService16['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService16['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService16['image'] = 'wan-san-yip-ID-4.png';
        $sliderService16['service_id'] = 4;
        ServiceSlider::create($sliderService16);


        // Service 5

        $sliderService17['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService17['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService17['image'] = 'wan-san-yip-ID-4.png';
        $sliderService17['service_id'] = 5;
        ServiceSlider::create($sliderService17);


        $sliderService18['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService18['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService18['image'] = 'wan-san-yip-ID-4.png';
        $sliderService18['service_id'] = 5;
        ServiceSlider::create($sliderService18);


        $sliderService19['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService19['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService19['image'] = 'wan-san-yip-ID-4.png';
        $sliderService19['service_id'] = 5;
        ServiceSlider::create($sliderService19);


        $sliderService20['title'] = [
            'ar'            => 'أسئلة شائعة',
            'en'            => 'Frequently Asked Questions'
        ];
        $sliderService20['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $sliderService20['image'] = 'wan-san-yip-ID-4.png';
        $sliderService20['service_id'] = 5;
        ServiceSlider::create($sliderService20);
    }
}
