<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteInfo;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Enum\ValidateEnum;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\WebsiteInfo as WebsiteInfoResources;
class ApiWebsiteInfo extends Controller
{
    //
    public function show(){
        $websiteInfo = WebsiteInfo::latest();
        $route = Route::current()->getName();
        if($route == 'show-control-info'){
            return view('admin.website-info-admin', [
                'websiteInfo'       => $websiteInfo->get()
            ]);
        }
    }

    public function store(Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_WEB_INFO, $error->required());
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $webInfo = new WebsiteInfoResources(WebsiteInfo::create([
            'key'           => $request->key,
            'value'         => [
                'ar'            => $request->value_ar,
                'en'            => $request->value_en
            ]
        ]));
        if($webInfo)
            return redirect()->route('show-control-info')->with('success',__('main.Success'));
        return back()->with(['error'=>'can not inserted']);
    }

    public function active(Request $request){
        $active;
        $id = $request->info_active_id;
        $find = new WebsiteInfoResources(WebsiteInfo::find($id));
        if($find->is_active == 0){
            $active = new WebsiteInfoResources(WebsiteInfo::where('id', $id)->update(['is_active' => 1]));
        }else{
            $active = new WebsiteInfoResources(WebsiteInfo::where('id', $id)->update(['is_active' => 0]));
        }
        if($active)
            return redirect()->route('show-control-info')->with('success',__('main.Success'));
        return back()->with(['error'=>'can not updated']);
    }

    public function delete(Request $request){
        $id = $request->info_delete_id;
        $find = WebsiteInfo::find($id);
        $delete = new WebsiteInfoResources($find->delete());
        if($delete)
            return redirect()->route('show-control-info')->with('success',__('main.Success'));
        return back()->with(['error'=>'can not updated']);
    }

    public function showInfo($id){
        $info = new WebsiteInfoResources(WebsiteInfo::find($id));
        return view('admin.show-info-website-admin', [
            'info'      => $info,
        ]);
    }

    public function update(Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_WEB_INFO, $error->required());
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $find = WebsiteInfo::find($request->id);
        $find->value = [
            'ar'        => $request->value_ar,
            'en'        => $request->value_en
        ];

        $update = new WebsiteInfoResources($find->update());
        if($update)
            // return redirect()->route(app()->getLocale().'/show-info/'.$request->id)->with('success',__('main.Success'));
            return redirect(app()->getLocale().'/show-info/'.$request->id)->with(['success' =>__('main.Success')]);
        return back()->with(['error'=>'can not Updated']);
    }
}
