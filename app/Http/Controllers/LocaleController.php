<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Lang;
use DB;
class LocaleController extends Controller
{
    public $previousRequest;
    protected $locale;
    //
    public function switch($locale){
        $this->previousRequest = \request()->create(url()->previous());
        $this->locale = $locale;
        $segment = $this->previousRequest->segments();
        if(array_key_exists($this->locale, config('locales.languages'))){
            $segment[0] = $this->locale;
            $newRoute = $this->translateRouteSegments($segment);
            return redirect()->to($this->buildNewRoute($newRoute));
        }
    }

    public function translateRouteSegments($segments){
        $translatedSegments = collect();
        foreach($segments as $segment){
            if($key = array_search($segment, Lang::get('routes'))){
                $translatedSegments->push(__('routes.'. $key, [], $this->locale));
            }else{
                $translatedSegments->push($segment);
            }
        }
        return $translatedSegments;
    }

    public function buildNewRoute($newRoute){
        $redirectUrl = implode('/', $newRoute->toArray());

        $queryBag = $this->previousRequest->query();
        $redirectUrl .= count($queryBag) ? '?' . http_build_query($queryBag) : '';
        return $redirectUrl; 
    }
}
