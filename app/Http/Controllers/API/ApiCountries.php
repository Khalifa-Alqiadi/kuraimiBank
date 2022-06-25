<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Enum\ValidateEnum;
use App\Http\Resources\Country as CountryResource;
class ApiCountries extends Controller
{
    //

    public function countriesAdmin(){
        return view('admin.countriesAdmin');
    }

    public function showCantry(){
        $countries = CountryResource::collection(Country::latest()->get());
        return response()->json([
            'status'            => 1,
            'countries'=> $countries,
            'locale' => app()->getLocale()
        ]);
    }

    public function addCountry(Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED, $error->required());
        if(!$validate->passes()){
            return response()->json(['status' => 0, 'error'=> $validate->errors()->toArray()]);
        }else{
            $countries = new CountryResource(Country::create([
                'name' => [
                    'ar' => $request->name_ar,
                    'en' => $request->name_en
                ]
            ]));
            if($countries)
                return response()->json(['status' => 1, 'success'=>__('main.Success')]);
                return back()->with(['error'=>'can not inserted']);
        }
    }

    public function EditCantry($id){
        $country = Country::find($id);
        if($country){
            return response()->json([
                'status'    => 1,
                'country'     => $country,
            ]);
        }else{
            return response()->json(['status' => 0, 'error'=> 'Not Found']);
        }
    }

    public function UpdateCountry(Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED, $error->required());
        if(!$validate->passes()){
            return response()->json(['status' => 0, 'error'=> $validate->errors()->toArray()]);
        }else{
            $id = $request->id;
            $data = Country::find($id);
            $data->name = [
                'ar'    => $request->name_ar,
                'en'    => $request->name_en,
            ];
            $country = new CountryResource($data->update());
            if($country)
                return response()->json(['status' => 1, 'success'=>__('main.Success')]);
            return back()->with(['error'=>'can not inserted']);
        }
    }

    public function ActiveCountry(Request $request){
        $country;
        $id = $request->category_id;
        $find = Country::find($id);
        if($find->is_active == 0){
            $country = new CountryResource(Country::where('id', $id)->update(['is_active' => 1]));
        }else{
            $country = new CountryResource(Country::where('id', $id)->update(['is_active' => 0]));
        }
        if($country)
            return response()->json(['status' => 1, 'success'=>__('main.Success')]);
            return back()->with(['error'=>'can not inserted']);
    }
    public function DeleteCountry(Request $request){
        $id = $request->category_id;
        $find = Country::find($id);
        $country = new CountryResource($find->delete());
        if($country)
            return response()->json(['status' => 1, 'success'=>__('main.Success')]);
            return back()->with(['error'=>'can not inserted']);
    }
}
