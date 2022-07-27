<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicePointsMapsController extends Controller
{
    //
    public function show()
    {
        return view('front.service-points-maps');
    }
}
