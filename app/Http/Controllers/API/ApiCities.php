<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\City as CityResource;
use App\Http\Controllers\Enum\ValidateEnum;
class ApiCities extends Controller
{
    //
    public function show(){
        $countries = Country::latest()->get();
        $cities = Country::with(['city'])->get();
        return view('admin.citiesAdmin', [
            'countries'          => $countries,
            'cities'             => $cities
        ]);
    }
    public function showCities(){
        $cities = CityResource::collection(City::with(['country'])->latest()->get());
        return response()->json([
            'status'            => 1,
            'cities'=> $cities,
            'locale' => app()->getLocale()
        ]);
    }

    public function edit($id){
        $cr = new CityResource(City::with(['country'])->find($id));
        $city = City::with(['country'])->find($id);
        return response()->json([
            'status'            => 1,
            'city'=> $city,
        ]);
    }

    public function store(Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED, $error->required());
        if(!$validate->passes()){
            return response()->json(['status' => 0, 'error'=> $validate->errors()->toArray()]);
        }else{
            $city = new CityResource(City::create([
                'name'      => [
                    'ar'        => $request->name_ar,
                    'en'        => $request->name_en
                ],
                'country_id'    => $request->country_id
            ]));
            if($city){
                return response()->json(['status' => 1, 'success' => __('main.Success')]);
            }
        }
    }

    public function update(Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED, $error->required());
        if(!$validate->passes()){
            return response()->json(['status' => 0, 'error'=> $validate->errors()->toArray()]);
        }else{
            $id = $request->id;
            $city = City::find($id);
            $city->name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ];
            $city->country_id = $request->country_id;
            $update = new CityResource($city->update());
            if($update)
                return response()->json(['status' => 1, 'success'=> __('main.Success')]);
            return back()->with(['error'=>'can not inserted']);
        }
    }

    public function active(Request $request){
        $city;
        $id = $request->city_id;
        $find = City::find($id);
        if($find->is_active == 0){
            $city = new CityResource(City::where('id', $id)->update(['is_active' => 1]));
        }else{
            $city = new CityResource(City::where('id', $id)->update(['is_active' => 0]));
        }
        if($city)
            return response()->json(['status' => 1, 'success'=>__('main.Success')]);
            return back()->with(['error'=>'can not inserted']);
    }

    public function delete(Request $request){
        $id = $request->city_id;
        $city = new CityResource(City::find($id));
        $delete = new CityResource($city->delete());
        if($delete)
            return response()->json(['status' => 1, 'success'=>__('main.Success')]);
        return back()->with(['error'=>'can not inserted']);
    }
}
