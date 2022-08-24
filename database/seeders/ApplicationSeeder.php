<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info_ar = '
            <p>التحويل بين الحسابات</p>
            <p> إدارة حساباتك</p>
            <p>ارسال الحوالات</p>
            <p>الإيداع للحسابات</p>
            <p>تبديل العملات بين حساباتك</p>
            <p>سداد فواتير الخدمات</p>
        ';

        $info_en = '
            <p>Transfer between accounts</p>
            <p>Manage your accounts</p>
            <p>Send remittances</p>
            <p>Deposit to accounts</p>
            <p>Exchange currencies between your accounts</p>
            <p>Pay utility bills</p>
        ';

        $app01['name'] = [
            'ar'            => 'الكريمي جوال',
            'en'            => 'Kurimi Jawal'
        ];
        $app01['list_info'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $app01['play_link'] = 'https://play.google.com/store/apps/details?id=com.KuraimiBank&hl=ar&gl=AR';
        $app01['store_link'] = 'https://apps.apple.com/sa/app/kuraimi-jawal/id1279242179';
        Application::create($app01);



        $app02['name'] = [
            'ar'            => 'ام فلوس - عملاء',
            'en'            => 'Am Floos - Customer'
        ];
        $app02['list_info'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $app02['play_link'] = 'https://play.google.com/store/apps/details?id=wallet.mfloos.com.mflooswallet.customer&hl=ar&gl=AR';
        $app02['store_link'] = 'https://play.google.com/store/apps/details?id=wallet.mfloos.com.mflooswallet.customer&hl=ar&gl=AR';
        Application::create($app02);



        $app03['name'] = [
            'ar'            => 'ام فلوس - وكلاء',
            'en'            => 'Am Floos - Agents'
        ];
        $app03['list_info'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $app03['play_link'] = 'https://play.google.com/store/apps/details?id=wallet.mfloos.com.mflooswallet&hl=ar';
        $app03['store_link'] = 'https://play.google.com/store/apps/details?id=wallet.mfloos.com.mflooswallet&hl=ar';
        Application::create($app03);



        $app04['name'] = [
            'ar'            => 'تطبيق التسجيل والمساعدة',
            'en'            => 'Registration and Assistance'
        ];
        $app04['list_info'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $app04['play_link'] = 'https://play.google.com/store/apps/details?id=com.remotecobapp&hl=ar';
        $app04['store_link'] = 'https://play.google.com/store/apps/details?id=com.remotecobapp&hl=ar';
        Application::create($app04);
    }
}
