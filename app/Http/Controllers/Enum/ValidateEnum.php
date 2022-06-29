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
    const REQUIRED_CATEGORIES = [
        'name_ar'       => 'required',
        'name_en'       => 'required',
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

    const REQUIRED_ADVANTAGES   = [
        'name_ar'           => 'required',
        'name_en'           => 'required',
        'image'             => 'required',
    ];

    const REQUIRED_SERVICE_POINTS       = [
        'name_ar'               => 'required',
        'name_en'               => 'required',
        'address_ar'            => 'required',
        'address_en'            => 'required',
        'phone'                 => 'required',
        'second_phone'          => 'required',
        'working_hours_ar'      => 'required',
        'working_hours_en'      => 'required',
        'lat'                   => 'required',
        'lng'                   => 'required',
    ];

    const REQUIRED_OUR_PARTNERS = [
        'title_ar'              => 'required',
        'title_en'              => 'required',
        'descrip_ar'            => 'required',
        'descrip_en'            => 'required',
        'image'                 => 'required',
    ];
    const REQUIRED_FINANCIAL_REPORTS = [
        'title_ar'              => 'required',
        'title_en'              => 'required',
        'descrip_ar'            => 'required',
        'descrip_en'            => 'required',
        'pdf'                   => 'required',
    ];

    const REQUIRED_LOGIN_ADMIN = [
        'email'                 => ['required', 'email', 'exists:users,email'],
        'password'              => 'required',
    ];

    public function required()
    {
        $MESSAGEENUM   = [
            'required'          => __('main.required'),
            'email.exists'            => __('main.Exists'),
            'email.email'       => __('main.Email'),
        ];
        return $MESSAGEENUM;
    }
}
