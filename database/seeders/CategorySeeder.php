<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category01['name'] = [
            'ar' => 'الرئيسية',
            'en' => 'Home',
        ];
        Category::create($category01);
        $category02['name'] = [
            'ar' => 'عن البنك',
            'en' => 'About bank',
        ];
        Category::create($category02);
        $category03['name'] = [
            'ar' => 'خدمات الأفراد',
            'en' => 'Personnel services',
        ];
        Category::create($category03);
        $category04['name'] = [
            'ar' => 'خدمات الشركات',
            'en' => 'Companies services',
        ];
        Category::create($category04);
        $category05['name'] = [
            'ar' => 'كريمي اكسبرس',
            'en' => 'Kurimi express',
        ];
        Category::create($category05);

        $category06['name'] = [
            'ar' => 'ام فلوس',
            'en' => 'Am floss',
        ];
        Category::create($category06);

        $category07['name'] = [
            'ar' => 'التمويل',
            'en' => 'Funding',
        ];
        Category::create($category07);

        $category08['name'] = [
            'ar' => 'تطبيقات البنك',
            'en' => 'Bank application',
        ];
        Category::create($category08);
    }
}
