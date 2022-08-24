<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\SuccessStories;
use Illuminate\Http\Request;

class SuccessStoriesController extends Controller
{
    //
    public function show()
    {
        return view('front.success-stories');
    }
    public function showTitle(SuccessStories $title)
    {
        $news = News::where('is_active', 1)->limit(3)->get();
        return view('front.success-stories', [
            'successStories'            => $title,
            'news'                      => $news,
        ]);
    }
}
