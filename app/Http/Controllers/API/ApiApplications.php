<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Enum\ValidateEnum;
use App\Models\Application;
use App\Http\Resources\Application as ResourcesApplication;
use Illuminate\Support\Facades\Validator;

class ApiApplications extends Controller
{
    //

    public function showApplications()
    {
        $applications = Application::get();
        return view('admin.admin-applications', [
            'applications'              => $applications,
        ]);
    }

    public function store(Request $request)
    {
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_APPLICATIONS, $error->required());
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $application = Application::create([
            'name'              => [
                'ar'                => $request->name_ar,
                'en'                => $request->name_en
            ],
            'list_info'      => [
                'ar'                => $request->application_info_ar,
                'en'                => $request->application_info_en
            ],
            'play_link'      => $request->play_link,
            'store_link'      => $request->store_link,
        ]);
        if ($application)
            return redirect()->route('admin-applications')->with('success', __('main.Success'));
        return back()->with(['error' => 'can not inserted']);
    }

    public function edit($id)
    {
        $sp = new ResourcesApplication(Application::find($id));
        $application = Application::find($id);
        return response()->json([
            'status'            => 1,
            'application' => $application,
        ]);
    }

    public function update(Request $request)
    {
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_APPLICATIONS, $error->required());
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $id = $request->applicationid;
        $find = Application::find($id);
        $find->name = [
            'ar'        => $request->name_ar,
            'en'        => $request->name_en,
        ];
        $find->play_link = $request->play_link;
        $find->store_link = $request->store_link;
        $find->list_info = [
            'ar'        => $request->application_info_ar,
            'en'        => $request->application_info_en
        ];

        $update = new ResourcesApplication($find->update());
        if ($update)
            return redirect()->route('admin-applications')->with('success', __('main.Success'));
        // return response()->json(['status' => 1, 'success'=>'Service Inserted Success']);
        return back()->with(['error' => 'can not inserted']);
    }

    public function active(Request $request)
    {
        $id = $request->application_active_id;
        $find = new ResourcesApplication(Application::find($id));
        if ($find->is_active == 0) {
            $application = new ResourcesApplication(Application::where('id', $id)->update(['is_active' => 1]));
        } else {
            $application = new ResourcesApplication(Application::where('id', $id)->update(['is_active' => 0]));
        }
        if ($application)
            return redirect()->route('admin-applications')->with('success', __('main.Success'));
        return back()->with(['error' => 'can not inserted']);
    }

    public function delete(Request $request)
    {
        $id = $request->application_delete_id;
        $find = Application::find($id);
        $delete = new ResourcesApplication($find->delete());
        if ($delete)
            return redirect()->route('admin-applications')->with('success', __('main.Success'));
        return back()->with(['error' => 'can not inserted']);
    }
}
