<?php

namespace App\Http\Controllers\API;
use App\Models\ServicePoint;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Enum\ValidateEnum;
use App\Http\Resources\ServicePoint as ServicePointResounces;
class ApiServicePoints extends Controller
{
    //

    public function showServicePoints(){
        $cities = City::get();
        return view('admin.service-points', [
            'cities'    => $cities,
        ]);
    }

    public function show(){
        $servicePoints = ServicePointResounces::collection(ServicePoint::with(['city'])->latest()->get());
        return response()->json([
            'status'            => 1,
            'servicePoints'=> $servicePoints,
            'locale' => app()->getLocale()
        ]);
    }

    public function store(Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_SERVICE_POINTS, $error->required());
        if(!$validate->passes()){
            return response()->json(['status' => 0, 'error'=> $validate->errors()->toArray()]);
        }else{
            $servicePoint = new ServicePointResounces(ServicePoint::create([
                'name'              => [
                    'ar'                => $request->name_ar,
                    'en'                => $request->name_en,
                ],
                'address'           => [
                    'ar'                => $request->address_ar,
                    'en'                => $request->address_en
                ],
                'phone'                 => $request->phone,
                'second_phone'          => $request->second_phone,
                'working_hours'     => [
                    'ar'                => $request->working_hours_ar,
                    'en'                => $request->working_hours_en,
                ],
                'city_id'           => $request->city_id,
                'lat'               => $request->lat,
                'lng'               => $request->lng,
            ]));
            if($servicePoint)
                return response()->json(['status' => 1, 'success'=>__('main.Success')]);
            return back()->with(['error'=>'can not inserted']);
        }
    }

    public function edit($id){
        $sp = new ServicePointResounces(ServicePoint::find($id));
        $servicePoint = ServicePoint::find($id);
        return response()->json([
            'status'            => 1,
            'servicePoint'=> $servicePoint,
        ]);
    }

    public function update(Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_SERVICE_POINTS, $error->required());
        if(!$validate->passes()){
            return response()->json(['status' => 0, 'error'=> $validate->errors()->toArray()]);
        }else{
            $id = $request->pointId;
            $servicePoint = ServicePoint::find($id);
            $servicePoint->name = [
                'ar'                => $request->name_ar,
                'en'                => $request->name_en,
            ];
            $servicePoint->address = [
                'ar'                => $request->address_ar,
                'en'                => $request->address_en
            ];
            $servicePoint->phone = $request->phone;
            $servicePoint->second_phone = $request->second_phone;
            $servicePoint->working_hours = [
                'ar'                => $request->working_hours_ar,
                'en'                => $request->working_hours_en,
            ];
            $servicePoint->lat = $request->lat;
            $servicePoint->lng = $request->lng;
            $servicePoint->city_id = $request->city_id;

            $update = new ServicePointResounces($servicePoint->update());
            if($update)
                return response()->json(['status' => 1, 'success'=>__('main.Success')]);
            return back()->with(['error'=>'can not inserted']);
        }
    }

    public function active(Request $request){
        $servicePoint;
        $id = $request->point_id;
        $find = new ServicePointResounces(ServicePoint::find($id));
        if($find->is_active == 0){
            $servicePoint = new ServicePointResounces(ServicePoint::where('id', $id)->update(['is_active' => 1]));
        }else{
            $servicePoint = new ServicePointResounces(ServicePoint::where('id', $id)->update(['is_active' => 0]));
        }
        if($servicePoint)
            return response()->json(['status' => 1, 'success'=>__('main.Success')]);
        return back()->with(['error'=>'can not inserted']);
    }

    public function delete(Request $request){
        $id = $request->point_delete_id;
        $find = ServicePoint::find($id);
        $delete = new ServicePointResounces($find->delete());
        if($delete)
            return response()->json(['status' => 1, 'success'=>__('main.Success')]);
        return back()->with(['error'=>'can not inserted']);
    }
}
