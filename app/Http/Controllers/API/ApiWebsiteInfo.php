<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteInfo;
use Illuminate\Support\Facades\Validator;
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
        $validate = Validator::make($request->all(), [
            'key'               => 'required|unique:website_infos,key',
            'value_ar'          => 'required',
            'value_ar'          => 'required',
        ]);
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
            return redirect('show-control-info')->with(['success' => 'Information Inserted Success']);
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
            return redirect('show-control-info')->with(['success' => 'Status Updated Success']);
        return back()->with(['error'=>'can not updated']);
    }

    public function showInfo($id){
        $info = new WebsiteInfoResources(WebsiteInfo::find($id));
        return view('admin.show-info-website-admin', [
            'info'      => $info,
        ]);
    }

    public function update(Request $request){
        $validate = Validator::make($request->all(), [
            'key'               => 'required',
            'value_ar'          => 'required',
            'value_ar'          => 'required',
        ]);
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
            return redirect(app()->getLocale().'/show-info/'.$request->id)->with(['success' => 'Information Updated Success']);
        return back()->with(['error'=>'can not Updated']);
    }
}
