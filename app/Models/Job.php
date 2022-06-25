<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Job extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    protected $table = 'jobs';
    public $translatable = ['title', 'description'];
}
