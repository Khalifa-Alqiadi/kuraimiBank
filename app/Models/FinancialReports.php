<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FinancialReports extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    protected $table = 'financial_reports';
    public $translatable = ['title', 'description'];
}
