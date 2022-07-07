<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    protected $table = 'categories';
    public $translatable = ['name'];
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
