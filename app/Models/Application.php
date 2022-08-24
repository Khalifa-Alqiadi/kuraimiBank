<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Application extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    protected $table = 'applications';
    public $translatable = ['name', 'list_info'];
}
