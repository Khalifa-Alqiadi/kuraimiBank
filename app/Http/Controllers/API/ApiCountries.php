<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;
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
        // dd($request);
        $validation = Validator::make($request->all(),[
            'name.ar'       => 'required|min:2',
            'name.en'       => 'required',

        ],[
            'required' => 'kijfgirgjfriogfr',
            'min' => 'must be min 6',
        ]);
        if(!$validation->passes()){
            return response()->json(['status' => 0, 'error'=> $validation->errors()->toArray()]);
        }else{
            
        // $category = new Category;
        $data['name'] = $request->name;
        $countries = new CountryResource(Country::create($data));
         if($countries)
            return response()->json(['status' => 1, 'success'=>'add category success']);
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
        $id = $request->countryid;
        $data['name'] = $request->name;
        $country = new CountryResource(Country::where('id', $id)->update($data));
        if($country)
            return response()->json(['status' => 1, 'success'=>'add category success']);
            return back()->with(['error'=>'can not inserted']);
    }
}
