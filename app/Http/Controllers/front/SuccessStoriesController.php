<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuccessStoriesController extends Controller
{
    //
    public function show()
    {
        return view('front.success-stories');
    }
}
