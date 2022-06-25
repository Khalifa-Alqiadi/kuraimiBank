<?php

namespace App\Http\Controllers\API;
use App\Models\ServicePoint;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        ]));
        if($servicePoint)
            return response()->json(['status' => 1, 'success'=>'Service Point Inserted Success']);
        return back()->with(['error'=>'can not inserted']);
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
        $servicePoint->city_id = $request->city_id;

        $update = new ServicePointResounces($servicePoint->update());
        if($update)
            return response()->json(['status' => 1, 'success'=>'Service Point Updated Success']);
        return back()->with(['error'=>'can not inserted']);
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
            return response()->json(['status' => 1, 'success'=>'Status Updated success']);
            return back()->with(['error'=>'can not inserted']);
    }
}
