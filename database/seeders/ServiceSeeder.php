<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ar = '
            <p>هذا النص هو مثال لنص يمكن أن يستبدل</p>
            <p>في نفس المساحة، لقد تم توليد هذا</p>
            <p> النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في</p>
            <p> النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في</p>
            <p>مثال لنص يمكن أن يستبدل</p>
        ';
        $en = '
            <p>This text is an example of text that can be replaced</p>
            <p>In the same space, this has been generated</p>
            <p>The text from the Arabic text generator This text is an example of a text that can be replaced in</p>
            <p>The text from the Arabic text generator This text is an example of a text that can be replaced in</p>
            <p>In the same space, this has been generated</p>
        ';
        $service01['name'] = [
            'ar'                => 'ماكينات الصراف الآلي',
            'en'                => 'Automated teller machines'
        ];
        $service01['description'] = [
            'ar'                => $ar,
            'en'                => $en

        ];
        $service01['background'] = 'Al- kurimi 1 png.png';
        $service01['category_id'] = 7;
        Service::create($service01);

        $service02['name'] = [
            'ar'                => 'البطاقات الإئتمانية',
            'en'                => 'Credit caeds'
        ];
        $service02['description'] = [
            'ar'                => $ar,
            'en'                => $en
        ];
        $service02['background'] = 'Al-_Kurimi_3 5 f.png';
        $service02['category_id'] = 3;
        Service::create($service02);



        $service03['name'] = [
            'ar'                => 'تمويل الملكة',
            'en'                => 'Financing ownership'
        ];
        $service03['description'] = [
            'ar'                => $ar,
            'en'                => $en
        ];
        $service03['background'] = 'Al- kurimi 2 png.png';
        $service03['category_id'] = 7;
        Service::create($service03);



        $service04['name'] = [
            'ar'                => 'حسابات الافراد',
            'en'                => 'Personal accounts'
        ];
        $service04['description'] = [
            'ar'                => $ar,
            'en'                => $en
        ];
        $service04['background'] = 'Al- kurimi 2 png.png';
        $service04['category_id'] = 3;
        Service::create($service04);



        $service05['name'] = [
            'ar'                => 'التمويل',
            'en'                => 'Funding'
        ];
        $service05['description'] = [
            'ar'                => $ar,
            'en'                => $en
        ];
        $service05['background'] = 'Al- kurimi 1 png.png';
        $service05['category_id'] = 7;
        Service::create($service05);
    }
}
