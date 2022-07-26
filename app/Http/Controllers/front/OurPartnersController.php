<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OurPartnersController extends Controller
{
    //
    public function show()
    {
        return view('front.our-partners');
    }
}
