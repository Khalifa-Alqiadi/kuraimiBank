<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceAdvantage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Enum\ValidateEnum;
use App\Http\Resources\ServiceAdvantage as ServiceAdvantageResounces;
class ApiServiceAdvantages extends Controller
{
    //
    public function show($id){
        $service_id = $id;
        $serviceAdv = ServiceAdvantageResounces::collection(ServiceAdvantage::where('service_id', $id)->get());
        return view('admin.service-advantages', [
            'serviceAdv'        => $serviceAdv,
            'service_id'        => $service_id,
        ]);
    }

    public function store(Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_ADVANTAGES, $error->required());
        // dd($validate); exit;
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        
        if($request->hasFile('image'))
            $image=$this->uploadFile($request->file('image'));
        $adv = new ServiceAdvantageResounces(ServiceAdvantage::create([
            'name'          => [
                'ar'            => $request->name_ar,
                'en'            => $request->name_en,
            ],
            'image'         => $image,
            'service_id'    => $request->service_id,
        ]));
        if($adv)
            return redirect(app()->getLocale().'/service-advantage/'.$request->service_id)->with(['success' => __('main.Success')]);
            return back()->with(['error'=>'can not inserted']);
    }

    public function edit($id){
        $sp = new ServiceAdvantageResounces(ServiceAdvantage::find($id));
        $adv = ServiceAdvantage::find($id);
        return response()->json([
            'status'            => 1,
            'adv'=> $adv,
        ]);
    }

    public function update(Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_ADVANTAGES, $error->required());
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $id = $request->adv_edit_id;
        $find = ServiceAdvantage::find($id);
        if($request->hasFile('image'))
            $image=$this->uploadFile($request->file('image'));
        $find->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
        $find->image = $image;

        $update = new ServiceAdvantageResounces($find->update());
        if($update)
            return redirect(app()->getLocale().'/service-advantage/'.$request->serviceid)->with(['success' => __('main.Success')]);
        return back()->with(['error'=>'can not inserted']);
    }

    public function active(Request $request){
        $advantage;
        $id = $request->adv_active_id;
        $find = ServiceAdvantage::find($id);
        // dd($id); exit;
        if($find->is_active == 0){
            $advantage = new ServiceAdvantageResounces(ServiceAdvantage::where('id', $id)->update(['is_active' => 1]));
        }else{
            $advantage = new ServiceAdvantageResounces(ServiceAdvantage::where('id', $id)->update(['is_active' => 0]));
        }
        if($advantage)
            return redirect(app()->getLocale().'/service-advantage/'.$request->serviceid)->with(['success' => __('main.Success')]);
        return back()->with(['error'=>'can not inserted']);
    }

    public function delete(Request $request){
        $id = $request->adv_delete_id;
        $find = new ServiceAdvantageResounces(ServiceAdvantage::find($id));
        if($find->delete())
            return redirect(app()->getLocale().'/service-advantage/'.$request->serviceid)->with(['success' => __('main.Success')]);
        return back()->with(['error'=>'can not inserted']);
    }


    public function uploadFile($file)
    { 
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        return $filename;
    }
}
