<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class ServiceAdvantage extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    protected $table = 'service_advantages';
    public $translatable = ['name'];

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
