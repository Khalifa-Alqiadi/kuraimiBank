<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceNumber;
use App\Http\Resources\ServiceNumber as ResourcesServiceNumber;
use App\Http\Controllers\Enum\ValidateEnum;
use Illuminate\Support\Facades\Validator;

class ApiServicesNumbers extends Controller
{
    public function showData()
    {
        return view('admin.our-services-numbers');
    }

    public function show()
    {
        $numbers = ResourcesServiceNumber::collection(ServiceNumber::latest()->get());
        return response()->json([
            'status'            => 1,
            'numbers' => $numbers,
            'locale' => app()->getLocale()
        ]);
    }

    public function store(Request $request)
    {
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_NUMBERS, $error->required());
        if (!$validate->passes()) {
            return response()->json(['status' => 0, 'error' => $validate->errors()->toArray()]);
        } else {
            $numbers = ServiceNumber::create([
                'numbers' => $request->number,
                'description' => [
                    'ar'            => $request->description_ar,
                    'en'            => $request->description_en
                ]
            ]);
            if ($numbers) return response()->json(['status' => 1, 'success' => __('main.Success')]);

            return back()->with(['error' => 'can not inserted']);
        }
    }

    public function edit($id)
    {
        $sp = new ResourcesServiceNumber(ServiceNumber::find($id));
        $number = ServiceNumber::find($id);
        return response()->json([
            'status'            => 1,
            'number' => $number,
        ]);
    }

    public function update(Request $request)
    {
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_NUMBERS, $error->required());
        if (!$validate->passes()) {
            return response()->json(['status' => 0, 'error' => $validate->errors()->toArray()]);
        } else {
            $id = $request->id;
            $find = ServiceNumber::find($id);
            $find->numbers        = $request->number;
            $find->description = [
                'ar'                => $request->description_ar,
                'en'                => $request->description_en
            ];
            $update = new ResourcesServiceNumber($find->update());
            if ($update)
                return response()->json([
                    'status'        => 1,
                    'success'       => __('main.Success'),
                ]);
        }
    }

    public function active(Request $request)
    {
        $id = $request->number_id;
        $find = new ResourcesServiceNumber(ServiceNumber::find($id));
        if ($find->is_active == 0) {
            $number = new ResourcesServiceNumber($find->update(['is_active' => 1]));
        } else {
            $number = new ResourcesServiceNumber($find->update(['is_active' => 0]));
        }
        if ($number)
            return response()->json(['status' => 1, 'success' => __('main.Success')]);
        return back()->with(['error' => 'can not inserted']);
    }

    public function delete(Request $request)
    {
        $id = $request->number_id;
        $find = new ResourcesServiceNumber(ServiceNumber::find($id));
        $delete = new ResourcesServiceNumber($find->delete());
        if ($delete)
            return response()->json(['status' => 1, 'success' => __('main.Success')]);
        return back()->with(['error' => 'can not inserted']);
    }
}
