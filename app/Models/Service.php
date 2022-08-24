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
    public $translatable = [
        'name',
        'description',
    ];

    public function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function advantages()
    {
        return $this->hasMany(ServiceAdvantage::class, 'service_id');
    }
    public function slider()
    {
        return $this->hasMany(ServiceSlider::class, 'service_id');
    }
    public function storeis()
    {
        return $this->hasMany(SuccessStories::class, 'service_id');
    }
}
