<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServicePoint;
use Illuminate\Support\Facades\Route;

class ServiceController extends Controller
{
    //
    public function show()
    {
        $route = Route::current()->getName();
        dd($route);
        $service = Service::get();
        return view('front.service', [
            'service'       => $service,
        ]);
    }
    public function showName(Service $name)
    {
        $route = Route::current()->getName();
        $services = Service::where('is_active', 1)->get();
        return view('front.service', [
            'service'       => $name,
            'services'      => $services,
        ]);
    }
}
