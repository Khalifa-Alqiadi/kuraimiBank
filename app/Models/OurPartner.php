<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class OurPartner extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    protected $table = 'our_partners';
    public $translatable = ['title', 'description'];
}
