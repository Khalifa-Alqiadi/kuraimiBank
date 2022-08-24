<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceAdvantage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Enum\ValidateEnum;
use App\Http\Resources\ServiceAdvantage as ServiceAdvantageResounces;
use App\Http\Resources\ServiceSlider as ResourcesServiceSlider;
use App\Models\ServiceSlider;
use Illuminate\Support\Facades\Route;

class ApiServiceAdvantages extends Controller
{
    //
    public function show($id)
    {
        $service_id = $id;
        $current = Route::current()->getName();
        $route = route($current, $id);
        $serviceAdv = ServiceAdvantageResounces::collection(ServiceAdvantage::where('service_id', $id)->get());
        $sliderService = ResourcesServiceSlider::collection(ServiceSlider::where('service_id', $id)->get());
        return view('admin.service-advantages', [
            'serviceAdv'        => $serviceAdv,
            'service_id'        => $service_id,
            'route'             => $route,
            'sliderService'     => $sliderService
        ]);
    }

    public function store(Request $request)
    {
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_ADVANTAGES, $error->required());
        // dd($validate); exit;
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $adv = new ServiceAdvantageResounces(ServiceAdvantage::create([
            'name'          => [
                'ar'            => $request->name_ar,
                'en'            => $request->name_en,
            ],
            'description'         => [
                'ar'             => $request->description_ar,
                'en'             => $request->description_en
            ],
            'service_id'    => $request->service_id,
        ]));
        if ($adv)
            return redirect(app()->getLocale() . '/service-advantage/' . $request->service_id)->with(['success' => __('main.Success')]);
        return back()->with(['error' => 'can not inserted']);
    }

    public function edit($id)
    {
        $sp = new ServiceAdvantageResounces(ServiceAdvantage::find($id));
        $adv = ServiceAdvantage::find($id);
        return response()->json([
            'status'            => 1,
            'adv' => $adv,
        ]);
    }

    public function update(Request $request)
    {
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_ADVANTAGES, $error->required());
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $id = $request->adv_edit_id;
        $find = ServiceAdvantage::find($id);
        $find->name = [
            'ar' => $request->name_ar,
            'en' => $request->name_en
        ];
        $find->description = [
            'ar'             => $request->description_ar,
            'en'             => $request->description_en
        ];

        $update = new ServiceAdvantageResounces($find->update());
        if ($update)
            return redirect(app()->getLocale() . '/service-advantage/' . $request->serviceid)->with(['success' => __('main.Success')]);
        return back()->with(['error' => 'can not inserted']);
    }

    public function active(Request $request)
    {
        $id = $request->adv_active_id;
        $find = ServiceAdvantage::find($id);
        if ($find->is_active == 0) {
            $advantage = new ServiceAdvantageResounces($find->update(['is_active' => 1]));
        } else {
            $advantage = new ServiceAdvantageResounces($find->update(['is_active' => 0]));
        }
        if ($advantage)
            return redirect(app()->getLocale() . '/service-advantage/' . $request->serviceid)->with(['success' => __('main.Success')]);
        return back()->with(['error' => 'can not inserted']);
    }

    public function delete(Request $request)
    {
        $id = $request->adv_delete_id;
        $find = new ServiceAdvantageResounces(ServiceAdvantage::find($id));
        if ($find->delete())
            return redirect(app()->getLocale() . '/service-advantage/' . $request->serviceid)->with(['success' => __('main.Success')]);
        return back()->with(['error' => 'can not inserted']);
    }
}
