<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info_ar = '
            هذا النص هو مثال لنص يمكن أن يستبدل في
            نفس المساحة، لقد تم توليد هذا النص من مولد
            النص العربى هذا النص هو مثال لنص يمكن أن
            يستبدل في نفس المساحة، لقد تم توليد هذا
            النص من مولد النص العربى هذا النص هو مثال
            لنص يمكن أن يستبدل
        ';
        $info_en = '
            This text is an example of text that can be replaced in the same space. 
            This text was generated from the Arabic text generator. 
            This text is an example of text that can be replaced in the same space. 
            This text was generated from the Arabic text generator. 
            This text is an example of text that can be replaced.
        ';

        $news01['title'] = [
            'ar'            => 'مشروع تحديث أنظمة البنك',
            'en'            => 'Bank systems modernization project'
        ];
        $news01['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $news01['background'] = 'md-duran-rE-3.png';
        News::create($news01);



        $news02['title'] = [
            'ar'            => 'مشروع تحديث أنظمة البنك',
            'en'            => 'Bank systems modernization project'
        ];
        $news02['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $news02['background'] = 'wan-san-yip-ID-4.png';
        News::create($news02);



        $news03['title'] = [
            'ar'            => 'مشروع تحديث أنظمة البنك',
            'en'            => 'Bank systems modernization project'
        ];
        $news03['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $news03['background'] = 'redd-PTRzqc_h-3.png';
        News::create($news03);



        $news04['title'] = [
            'ar'            => 'مشروع تحديث أنظمة البنك',
            'en'            => 'Bank systems modernization project'
        ];
        $news04['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $news04['background'] = 'NoPath.png';
        News::create($news04);



        $news05['title'] = [
            'ar'            => 'مشروع تحديث أنظمة البنك',
            'en'            => 'Bank systems modernization project'
        ];
        $news05['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $news05['background'] = 'Group -51.png';
        News::create($news05);



        $news06['title'] = [
            'ar'            => 'مشروع تحديث أنظمة البنك',
            'en'            => 'Bank systems modernization project'
        ];
        $news06['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $news06['background'] = 'wan-san-yip-ID-4.png';
        News::create($news06);



        $news07['title'] = [
            'ar'            => 'مشروع تحديث أنظمة البنك',
            'en'            => 'Bank systems modernization project'
        ];
        $news07['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $news07['background'] = 'redd-PTRzqc_h-3.png';
        News::create($news07);



        $news08['title'] = [
            'ar'            => 'مشروع تحديث أنظمة البنك',
            'en'            => 'Bank systems modernization project'
        ];
        $news08['description'] = [
            'ar'            => $info_ar,
            'en'            => $info_en
        ];
        $news08['background'] = 'NoPath.png';
        News::create($news08);
    }
}
