<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinancialReportsController extends Controller
{
    //
    public function show()
    {
        return view('front.financial-reports');
    }
}
