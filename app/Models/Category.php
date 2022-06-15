<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model
{
    use HasFactory, HasTranslations, Sluggable;

    protected $guarded = [];
    public $translatable = ['name', 'slug'];

    public function sluggable(): array {
        return [
            'slug->ar' => [
                'source'    => 'name->ar',
            ],
            'slug->en' => [
                'source'    => 'name->en',
            ]
        ];
    }
    public function asJson($value){
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    public function getRouteKeyName(){
        return 'slug';
    }

    public function getTitlearAttribute(){
        return $this->getTranslation('name', 'ar');
    }
    public function getTitleenAttribute(){
        return $this->getTranslation('name', 'en');
    }
    
}
