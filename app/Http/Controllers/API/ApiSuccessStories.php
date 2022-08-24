<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\ValidateEnum;
use App\Http\Resources\Service as ResourcesService;
use App\Http\Resources\SuccessStories as ResourcesSuccessStories;
use App\Models\Service;
use App\Models\SuccessStories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiSuccessStories extends Controller
{
    public function show()
    {
        $services = ResourcesService::collection(Service::where('is_active', 1)->get());
        $successStories = ResourcesSuccessStories::collection(SuccessStories::with('SuccessStory')->get());
        return view('admin.success-stories-admin', [
            'services'              => $services,
            'successStories'        => $successStories,
        ]);
    }

    public function store(Request $request)
    {

        $error = new ValidateEnum;
        // dd($request);
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_SUCCESS_STORIES, $error->required());
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        if ($background = $request->hasFile('main_image'))
            $background = $this->uploadFile($request->file('main_image'));
        if ($request->hasfile('onther_images')) {
            foreach ($request->file('onther_images') as $image) {
                $name = date('YmdHi') . $image->getClientOriginalName();
                $image->move(public_path('images'), $name);
                $data[] = $name;
            }
        }
        $story = SuccessStories::create([
            'title'              => [
                'ar'                => $request->title_ar,
                'en'                => $request->title_en
            ],
            'background'       => $background,
            'images'           => json_encode($data),
            'service_id'       => $request->service,
            'description'      => [
                'ar'                => $request->description_ar,
                'en'                => $request->description_en
            ],
            'onther_description'      => [
                'ar'                => $request->onther_description_ar,
                'en'                => $request->onther_description_en
            ],
        ]);
        if ($story)
            return redirect()->route('success-stories-admin')->with('success', __('main.Success'));
        return back()->with(['error' => 'can not inserted']);
    }

    public function edit($id)
    {
        $sp = new ResourcesSuccessStories(SuccessStories::find($id));
        $stories = SuccessStories::find($id);
        return response()->json([
            'status'            => 1,
            'stories' => $stories,
        ]);
    }

    public function update(Request $request)
    {
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_SUCCESS_STORIES, $error->required());
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $data = [];
        if ($background = $request->hasFile('main_image'))
            $background = $this->uploadFile($request->file('main_image'));
        if ($request->hasfile('onther_images')) {
            foreach ($request->file('onther_images') as $image) {
                $name = date('YmdHi') . $image->getClientOriginalName();
                $image->move(public_path('images'), $name);
                $data[] = $name;
            }
        }
        $id = $request->storyid;
        $find = SuccessStories::find($id);
        $find->title = [
            'ar'        => $request->title_ar,
            'en'        => $request->title_en,
        ];
        $find->background = $background;
        $find->images = json_encode($data);
        $find->service_id = $request->service;
        $find->description = [
            'ar'        => $request->description_ar,
            'en'        => $request->description_en
        ];
        $find->onther_description = [
            'ar'        => $request->onther_description_ar,
            'en'        => $request->onther_description_en
        ];

        $update = new ResourcesSuccessStories($find->update());
        if ($update)
            return redirect()->route('success-stories-admin')->with('success', __('main.Success'));
        return back()->with(['error' => 'can not inserted']);
    }

    public function active(Request $request)
    {
        $id = $request->stories_active_id;
        $find = new ResourcesSuccessStories(SuccessStories::find($id));
        if ($find->is_active == 0) {
            $service = new ResourcesSuccessStories(SuccessStories::where('id', $id)->update(['is_active' => 1]));
        } else {
            $service = new ResourcesSuccessStories(SuccessStories::where('id', $id)->update(['is_active' => 0]));
        }
        if ($service)
            return redirect()->route('success-stories-admin')->with('success', __('main.Success'));
        return back()->with(['error' => 'can not inserted']);
    }

    public function delete(Request $request)
    {
        $id = $request->stories_delete_id;
        $find = SuccessStories::find($id);
        $delete = new ResourcesSuccessStories($find->delete());
        if ($delete)
            return redirect()->route('success-stories-admin')->with('success', __('main.Success'));
        return back()->with(['error' => 'can not inserted']);
    }
}
