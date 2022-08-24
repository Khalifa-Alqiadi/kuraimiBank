<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SuccessStories extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    protected $table = 'success_stories';
    public $translatable = ['title', 'description', 'onther_description'];

    public function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    public function SuccessStory()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
