<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class WebsiteInfo extends Model
{
    use HasFactory, HasTranslations;
    protected $guarded = [];
    protected $table = 'website_infos';
    public $translatable = ['value'];
}
