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
    const REQUIRED_COUNTRIES = [
        'name_ar'       => 'required',
        'name_en'       => 'required',
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
        'background'        => 'required',
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
        'description_ar'    => 'required',
        'description_en'    => 'required',
    ];
    const REQUIRED_SLIDER_SERVICE   = [
        'slider_name_ar'           => 'required',
        'slider_name_en'           => 'required',
        'image'                    => 'required',
        'slider_description_ar'    => 'required',
        'slider_description_en'    => 'required',
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

    const REQUIRED_USERS        = [
        'firstnsme'              => 'required',
        'lastname'               => 'required',
        'email'                  => 'required',
        'phone'                  => 'required',
        'address'                => 'required',
        'image'                  => 'required',
    ];
    const REQUIRED_APPLICATIONS  = [
        'name_ar'               => 'required',
        'name_en'               => 'required',
        'play_link'             => 'required',
        'store_link'            => 'required',
        'application_info_ar'   => 'required',
        'application_info_en'   => 'required',
    ];
    const REQUIRED_NUMBERS  = [
        'number'               => 'required',
        'description_ar'       => 'required',
        'description_en'       => 'required',
    ];

    const REQUIRED_SUCCESS_STORIES = [
        'title_ar'                  => 'required',
        'title_en'                  => 'required',
        'main_image'                => 'required',
        'onther_images'             => 'required',
        'description_ar'            => 'required',
        'description_en'            => 'required',
        'onther_description_ar'      => 'required',
        'onther_description_en'      => 'required',
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
