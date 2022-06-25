<?php

namespace App\Http\Controllers\API;
use App\Models\Service;
use App\Models\Category;
use App\Http\Resources\Service as ServiceResources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiServices extends Controller
{
    //
    public function ShowServices(){

 
        $categories = Category::where('parent_category', 0)->get();
        $categoriesChild = Category::where('parent_category', '!=', 0)->get();
        $services = ServiceResources::collection(Service::with('category')->latest()->get());
        return view('admin.services-admin', [
            'services'              => $services,
            'categories'            => $categories,
            'categoriesChild'       => $categoriesChild,
        ]);
    }

    public function store(Request $request){
        $service = Service::create([
            'name'              => [
                'ar'                => $request->service_name_ar,
                'en'                => $request->service_name_en
            ],
            'service_info'      => [
                'ar'                => $request->service_info_ar,
                'en'                => $request->service_info_en
            ],
            'category_id'       => $request->category_service,
            ]);
            if($service)
                return redirect('Show-Services')->withSuccess(['Service Inserted Success']);
                // return response()->json(['status' => 1, 'success'=>'Service Inserted Success']);
            return back()->with(['error'=>'can not inserted']);
    }

    public function edit($id){
        $sp = new ServiceResources(Service::find($id));
        $service = Service::find($id);
        return response()->json([
            'status'            => 1,
            'service'=> $service,
        ]);
    }

    public function update(Request $request){
        $id = $request->serviceid;
        $find = Service::find($id);
        $find->name = [
            'ar'        => $request->service_name_edit_ar,
            'en'        => $request->service_name_edit_en,
        ];
        $find->category_id = $request->category_service;
        $find->service_info = [
            'ar'        => $request->service_info_edit_ar,
            'en'        => $request->service_info_edit_en
        ];

        $update = new ServiceResources($find->update());
        if($update)
                return redirect('Show-Services')->with(['success' => 'Service Updated Success']);
                // return response()->json(['status' => 1, 'success'=>'Service Inserted Success']);
            return back()->with(['error'=>'can not inserted']);
    }

    public function active(Request $request){
        $service;
        $id = $request->service_active_id;
        $find = new ServiceResources(Service::find($id));
        if($find->is_active == 0){
            $service = new ServiceResources(Service::where('id', $id)->update(['is_active' => 1]));
        }else{
            $service = new ServiceResources(Service::where('id', $id)->update(['is_active' => 0]));
        }
        if($service)
            return redirect('Show-Services')->with(['success' => 'Status Updated Success']);
            return back()->with(['error'=>'can not inserted']);
    }
}
