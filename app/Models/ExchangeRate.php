<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class ExchangeRate extends Model
{
    use HasFactory, HasTranslations;
    protected $guarded = [];
    protected $table = 'exchange_rates';
    public $translatable = ['name'];
}
