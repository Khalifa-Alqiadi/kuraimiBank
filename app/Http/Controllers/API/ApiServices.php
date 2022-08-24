<?php

namespace App\Http\Controllers\API;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Enum\ValidateEnum;
use App\Http\Resources\Service as ServiceResources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiServices extends Controller
{
    //
    public function ShowServices()
    {


        $categories = Category::where('parent_category', 0)->get();
        $categoriesChild = Category::where('parent_category', '!=', 0)->get();
        $services = ServiceResources::collection(Service::with('category')->latest()->get());
        return view('admin.services-admin', [
            'services'              => $services,
            'categories'            => $categories,
            'categoriesChild'       => $categoriesChild,
        ]);
    }

    public function store(Request $request)
    {
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_SERVICES, $error->required());
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        if ($image = $request->hasFile('background'))
            $image = $this->uploadFile($request->file('background'));
        $service = Service::create([
            'name'              => [
                'ar'                => $request->name_ar,
                'en'                => $request->name_en
            ],
            'description'      => [
                'ar'                => $request->service_info_ar,
                'en'                => $request->service_info_en
            ],
            'background'        => $image,
            'category_id'       => $request->category_service,
        ]);
        if ($service)
            return redirect()->route('Show-Services')->with('success', __('main.Success'));
        // return response()->json(['status' => 1, 'success'=>'Service Inserted Success']);
        return back()->with(['error' => 'can not inserted']);
    }

    public function edit($id)
    {
        $sp = new ServiceResources(Service::find($id));
        $service = Service::find($id);
        return response()->json([
            'status'            => 1,
            'service' => $service,
        ]);
    }

    public function update(Request $request)
    {
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_SERVICES, $error->required());
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $id = $request->serviceid;
        $find = Service::find($id);
        $find->name = [
            'ar'        => $request->name_ar,
            'en'        => $request->name_en,
        ];
        $find->category_id = $request->category_service;
        $find->description = [
            'ar'        => $request->service_info_ar,
            'en'        => $request->service_info_en
        ];

        $update = new ServiceResources($find->update());
        if ($update)
            return redirect()->route('Show-Services')->with('success', __('main.Success'));
        // return response()->json(['status' => 1, 'success'=>'Service Inserted Success']);
        return back()->with(['error' => 'can not inserted']);
    }

    public function active(Request $request)
    {
        $service;
        $id = $request->service_active_id;
        $find = new ServiceResources(Service::find($id));
        if ($find->is_active == 0) {
            $service = new ServiceResources(Service::where('id', $id)->update(['is_active' => 1]));
        } else {
            $service = new ServiceResources(Service::where('id', $id)->update(['is_active' => 0]));
        }
        if ($service)
            return redirect()->route('Show-Services')->with('success', __('main.Success'));
        return back()->with(['error' => 'can not inserted']);
    }

    public function delete(Request $request)
    {
        $id = $request->service_delete_id;
        $find = Service::find($id);
        $delete = new ServiceResources($find->delete());
        if ($delete)
            return redirect()->route('Show-Services')->with('success', __('main.Success'));
        return back()->with(['error' => 'can not inserted']);
    }
}
