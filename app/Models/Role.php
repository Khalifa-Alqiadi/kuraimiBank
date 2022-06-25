<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;
use Spatie\Translatable\HasTranslations;
class Role extends LaratrustRole
{
    use HasTranslations;
    public $guarded = [];
    protected $table = 'roles';
    public $translatable = [];
}
