<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class ServicePoint extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    protected $table = 'service_points';
    public $translatable = ['name', 'address', 'working_hours'];

    public function city(){
        return $this->belongsTo(City::class);
    }
}
