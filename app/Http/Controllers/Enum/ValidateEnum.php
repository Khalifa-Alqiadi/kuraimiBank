<?php

namespace App\Http\Controllers\Enum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValidateEnum extends Controller
{
    //
    const REQUIRED = [
        'name_ar'       => 'required',
        'name_en'       => 'required',
        'sale'          => 'required',
        'buy'           => 'required',
    ];

    const REQUIRED_JOBS = [
        'title_ar'      => 'required',
        'title_en'      => 'required',
        'descrip_ar'    => 'required',
        'descrip_en'    => 'required',
    ];

    const REQUIRED_SOCIAL_MEDIA = [
        'name_ar'       => 'required',
        'name_en'       => 'required',
        'link'          => 'required',
        'icons'         => 'required',
    ];

    const REQUIRED_SERVICES = [
        'name_ar'           => 'required',
        'name_en'           => 'required',
        'service_info_ar'   => 'required',
        'service_info_en'   => 'required',
    ];

    const REQUIRED_WEB_INFO = [
        'key'               => 'required',
        'value_ar'          => 'required',
        'value_en'          => 'required',
    ];
    

    public function required(){
        $MESSAGEENUM   = [
            'required'          => __('main.required'),
        ];
        return $MESSAGEENUM;
    }
}
