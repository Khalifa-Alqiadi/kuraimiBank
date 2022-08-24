<?php

namespace Database\Seeders;

use App\Models\BoardDirectorsInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardDirectorsInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $boardDirectorsInfo01['name'] = [
            'ar'            => 'هشام محمود الحاج',
            'en'            => 'Hisham Mahmoud Al-Hajj'
        ];
        $boardDirectorsInfo01['info'] = [
            'ar'            => 'رئيس المجلس',
            'en'            => 'Chairman of the Board'
        ];
        $boardDirectorsInfo01['image'] = 'bank-image-3.png';
        $boardDirectorsInfo01['board_director_id'] = 1;
        BoardDirectorsInfo::create($boardDirectorsInfo01);


        $boardDirectorsInfo02['name'] = [
            'ar'            => 'ماجيد سند السماوي',
            'en'            => 'Majid Sanad Al-Samawi'
        ];
        $boardDirectorsInfo02['info'] = [
            'ar'            => 'نائب رئيس المجلس',
            'en'            => 'Vice Chairman of the Board'
        ];
        $boardDirectorsInfo02['image'] = 'bank-image-2.png';
        $boardDirectorsInfo02['board_director_id'] = 1;
        BoardDirectorsInfo::create($boardDirectorsInfo02);


        $boardDirectorsInfo03['name'] = [
            'ar'            => 'علي محمد علي الشميري',
            'en'            => 'Ali Muhammad Ali Al-Shamiri'
        ];
        $boardDirectorsInfo03['info'] = [
            'ar'            => 'عضو',
            'en'            => 'Member'
        ];
        $boardDirectorsInfo03['image'] = 'bank-image-1.png';
        $boardDirectorsInfo03['board_director_id'] = 1;
        BoardDirectorsInfo::create($boardDirectorsInfo03);


        $boardDirectorsInfo04['name'] = [
            'ar'            => 'وليد محمد احمد',
            'en'            => 'Walid Mohamed Ahmed'
        ];
        $boardDirectorsInfo04['info'] = [
            'ar'            => 'عضو',
            'en'            => 'Member'
        ];
        $boardDirectorsInfo04['image'] = 'bank-image-5.png';
        $boardDirectorsInfo04['board_director_id'] = 1;
        BoardDirectorsInfo::create($boardDirectorsInfo04);


        $boardDirectorsInfo04['name'] = [
            'ar'            => 'وليد محمد احمد',
            'en'            => 'Walid Mohamed Ahmed'
        ];
        $boardDirectorsInfo04['info'] = [
            'ar'            => 'عضو',
            'en'            => 'Member'
        ];
        $boardDirectorsInfo04['image'] = 'bank-image-5.png';
        $boardDirectorsInfo04['board_director_id'] = 1;
        BoardDirectorsInfo::create($boardDirectorsInfo04);


        $boardDirectorsInfo05['name'] = [
            'ar'            => 'محمد عبداالله نايف',
            'en'            => 'Mohammed Abdullah Nayef'
        ];
        $boardDirectorsInfo05['info'] = [
            'ar'            => 'عضو',
            'en'            => 'Member'
        ];
        $boardDirectorsInfo05['image'] = 'bank-image-4.png';
        $boardDirectorsInfo05['board_director_id'] = 1;
        BoardDirectorsInfo::create($boardDirectorsInfo05);


        $boardDirectorsInfo06['name'] = [
            'ar'            => 'عبداالله علي احمد',
            'en'            => 'Abdullah Ali Ahmed'
        ];
        $boardDirectorsInfo06['info'] = [
            'ar'            => 'عضو',
            'en'            => 'Member'
        ];
        $boardDirectorsInfo06['image'] = 'bank-image-2.png';
        $boardDirectorsInfo06['board_director_id'] = 2;
        BoardDirectorsInfo::create($boardDirectorsInfo06);


        $boardDirectorsInfo07['name'] = [
            'ar'            => 'مها عبده محمد',
            'en'            => 'Maha Abdo Mohammed'
        ];
        $boardDirectorsInfo07['info'] = [
            'ar'            => 'عضو',
            'en'            => 'Member'
        ];
        $boardDirectorsInfo07['image'] = 'bank-image-6.png';
        $boardDirectorsInfo07['board_director_id'] = 2;
        BoardDirectorsInfo::create($boardDirectorsInfo07);


        $boardDirectorsInfo08['name'] = [
            'ar'            => 'محمد إبراهيم حسن',
            'en'            => 'Mohamed Ibrahim Hassan'
        ];
        $boardDirectorsInfo08['info'] = [
            'ar'            => 'عضو',
            'en'            => 'Member'
        ];
        $boardDirectorsInfo08['image'] = 'bank-image-1.png';
        $boardDirectorsInfo08['board_director_id'] = 2;
        BoardDirectorsInfo::create($boardDirectorsInfo08);


        $boardDirectorsInfo09['name'] = [
            'ar'            => 'سلمان اصيل ايمن العريقي',
            'en'            => 'Salman Aseel Ayman Al-Areeqi'
        ];
        $boardDirectorsInfo09['info'] = [
            'ar'            => 'محاسب قانوني',
            'en'            => 'Accountant'
        ];
        $boardDirectorsInfo09['image'] = 'bank-image-7.png';
        $boardDirectorsInfo09['board_director_id'] = 3;
        BoardDirectorsInfo::create($boardDirectorsInfo09);


        $boardDirectorsInfo10['name'] = [
            'ar'            => 'حسين حسن الحسن',
            'en'            => 'Hussein Hassan Hassan'
        ];
        $boardDirectorsInfo10['info'] = [
            'ar'            => 'محاسب قانوني',
            'en'            => 'Accountant'
        ];
        $boardDirectorsInfo10['image'] = 'bank-image-4.png';
        $boardDirectorsInfo10['board_director_id'] = 3;
        BoardDirectorsInfo::create($boardDirectorsInfo10);
    }
}
