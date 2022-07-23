<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutBankController extends Controller
{
    //

    public function show()
    {
        return view('front.about-bank');
    }
}
