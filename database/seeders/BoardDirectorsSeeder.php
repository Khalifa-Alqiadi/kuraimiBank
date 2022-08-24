<?php

namespace Database\Seeders;

use App\Models\BoardDirectors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardDirectorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info_ar = '
        يتشكل مجلس الإدارة من مجموعة من الأعضاء ذو
        خبرات في مجالات مختلفة تساهم بشكل كبير من
        قيادة البنك إلى التقدم بخط ً ثابتة نحو النجاح و تحقيق
        أهدافه. وأعضاء مجلس الإدارة هم
        ';

        $info_en = '
        The Board of Directors is made up of a group of members with
        Experience in different fields contributes significantly to
        Leading the bank to move forward with a steady line towards success and achievement
        its goals. The members of the board of directors are
        ';

        $images = array(
            'bank-image-7.png',
            'bank-image-6.png',
            'bank-image-4.png',
            'bank-image-3.png',
            'bank-image-2.png',
            'bank-image-1.png',
            'bank-image-5.png',
            'bank-image-6.png',
        );

        $boardDirectors01['title'] = [
            'ar'                => 'مجلس الإدارة',
            'en'                => 'Board of Directors'
        ];
        $boardDirectors01['description'] = [
            'ar'                => $info_ar,
            'en'                => $info_en
        ];
        $boardDirectors01['images'] = json_encode($images);
        BoardDirectors::create($boardDirectors01);


        $boardDirectors02['title'] = [
            'ar'                => 'هيئة الرقابة الشرعية البنك',
            'en'                => 'Bank Sharia Supervisory Board'
        ];
        $boardDirectors02['images'] = json_encode($images);
        BoardDirectors::create($boardDirectors02);


        $boardDirectors03['title'] = [
            'ar'                => 'المحاسبون القانونيون',
            'en'                => 'Chartered Accountants'
        ];
        $boardDirectors03['images'] = json_encode($images);
        BoardDirectors::create($boardDirectors03);
    }
}
