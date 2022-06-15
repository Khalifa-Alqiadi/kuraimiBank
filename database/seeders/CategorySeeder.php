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
            'ar' => 'خدمات الافراد',
            'en' => 'provider services',
        ];
        Category::create($category01);
    }
}
