<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    protected $table = 'countries';
    public $translatable = ['name'];

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

    public function city(){
        return $this->hasMany(City::class, 'id');
    }
}
