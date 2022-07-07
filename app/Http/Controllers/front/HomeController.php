<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    //
    public function frontIndex()
    {
        $categories = Category::with('services')->latest()->get();
        return view('front.index', ['categories' => $categories]);
    }
}
