<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    // public function permission()
    // {
    //     return $this->hasMany(Permission::class);
    // }
}
