<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ExchangeRate;
use App\Models\News;
use App\Models\ServiceNumber;

class HomeController extends Controller
{
    //
    public function frontIndex()
    {
        $rates = ExchangeRate::where('is_active', 1)->get();
        $services = Service::where('is_active', 1)->get();
        $applications = Application::where('is_active', 1)->get();
        $servicsNumbers = ServiceNumber::where('is_active', 1)->get();
        $news = News::limit(7)->get();
        return view('front.index', [
            'rates'             => $rates,
            'services'          => $services,
            'applications'      => $applications,
            'news'              => $news,
            'servicsNumbers'    => $servicsNumbers,
        ]);
    }
}
