<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ServiceNumber extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    protected $table = 'service_numbers';
    public $translatable = ['description'];
}
