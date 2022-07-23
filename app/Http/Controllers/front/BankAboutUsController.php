<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankAboutUsController extends Controller
{
    //
    public function show()
    {
        return view('front.bank-about-us');
    }
}
