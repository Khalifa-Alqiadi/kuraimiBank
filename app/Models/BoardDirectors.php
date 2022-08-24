<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BoardDirectors extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    protected $table = 'board_directors';
    public $translatable = ['title', 'description'];
}
