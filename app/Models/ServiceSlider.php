<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ServiceSlider extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    protected $table = 'service_sliders';
    public $translatable = ['title', 'description'];
}
