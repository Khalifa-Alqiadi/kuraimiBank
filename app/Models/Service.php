<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Service extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    protected $table = 'services';
    public $translatable = ['name', 'service_info'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
