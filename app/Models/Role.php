<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    // public function role_user(){
    //     return $this->belongsTo(R::class);
    // }
}
