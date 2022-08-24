<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Enum\ValidateEnum;
use App\Http\Resources\ServiceSlider as ResourcesServiceSlider;
use App\Models\ServiceSlider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class ApiServicesSlider extends Controller
{
    public function store(Request $request)
    {
        $route = $request->route;
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_SLIDER_SERVICE, $error->required());
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        if ($image = $request->hasFile('image'))
            $image = $this->uploadFile($request->file('image'));
        $slider = new ResourcesServiceSlider(ServiceSlider::create([
            'title'             => [
                'ar'                => $request->slider_name_ar,
                'en'                => $request->slider_name_en
            ],
            'image'             => $image,
            'description'       => [
                'ar'                => $request->slider_description_ar,
                'en'                => $request->slider_description_en
            ],
            'service_id'        => $request->service_id
        ]));
        if ($slider)
            return redirect($route)->with('success', __('main.Success'));
        // return response()->json(['status' => 1, 'success'=>'Service Inserted Success']);
        return back()->with(['error' => 'can not inserted']);
    }

    public function update(Request $request)
    {
        $route = $request->route;
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_SLIDER_SERVICE, $error->required());
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        if ($image = $request->hasFile('new_image'))
            $image = $this->uploadFile($request->file('new_image'));
        else
            $image = $request->image;

        $id = $request->edit_sliderid;
        $find = ServiceSlider::find($id);
        $find->title = [
            'ar'            => $request->slider_name_ar,
            'en'            => $request->slider_name_en
        ];
        $find->description = [
            'ar'            => $request->slider_description_ar,
            'en'            => $request->slider_description_en
        ];
        $find->image = $image;
        $update = new ResourcesServiceSlider($find->update());
        if ($update)
            return redirect($route)->with('success', __('main.Success'));
        return back()->with(['error' => 'can not updated']);
    }

    public function active(Request $request)
    {
        $route = $request->route;
        $id = $request->slider_active_id;
        $find = ServiceSlider::find($id);
        if ($find->is_active == 0) {
            $advantage = new ResourcesServiceSlider($find->update(['is_active' => 1]));
        } else {
            $advantage = new ResourcesServiceSlider($find->update(['is_active' => 0]));
        }
        if ($advantage)
            return redirect($route)->with(['success' => __('main.Success')]);
        return back()->with(['error' => 'can not inserted']);
    }

    public function delete(Request $request)
    {
        $route = $request->route;
        $id = $request->slider_delete_id;
        $find = new ResourcesServiceSlider(ServiceSlider::find($id));
        if ($find->delete())
            return redirect($route)->with(['success' => __('main.Success')]);
        return back()->with(['error' => 'can not inserted']);
    }
}
