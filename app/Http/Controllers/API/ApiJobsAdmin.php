<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Job as JobResources;
use App\Models\Job;
use App\Http\Controllers\Enum\ValidateEnum;
class ApiJobsAdmin extends Controller
{
    //
    public function showJobs(){
        $jobs = Job::get();
        return view('admin.jobs-admin', [
            'jobs'      => $jobs
        ]);
    }

    public function show(){
        $jobs = JobResources::collection(Job::latest()->get());
        return response()->json([
            'status'        => 1,
            'jobs'          => $jobs
        ]);
    }

    public function store(Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_JOBS, $error->required());
        if(!$validate->passes()){
            return response()->json(['status' => 0, 'error'=> $validate->errors()->toArray()]);
        }else{
            $job = new JobResources(Job::create([
                'title'         => [
                    'ar'            => $request->title_ar,
                    'en'            => $request->title_en,
                ],
                'description'   => [
                    'ar'            => $request->descrip_ar,
                    'en'            => $request->descrip_en
                ]
            ]));
            if($job)
            return response()->json(['status' => 1, 'success' =>__('main.Success')]);
            return response()->json(['error' => 'sorry can not insert']);
        }
    }

    public function edit($id){
        $sp = new JobResources(Job::find($id));
        $job = Job::find($id);
        return response()->json([
            'status'            => 1,
            'job'=> $job,
        ]);
    }

    public function update(Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_JOBS, $error->required());
        if(!$validate->passes()){
            return response()->json(['status' => 0, 'error'=> $validate->errors()->toArray()]);
        }else{

            $id = $request->id;
            $find = Job::find($id);
            $find->title = [
                'ar'        => $request->title_ar,
                'en'        => $request->title_en,
            ];
            $find->description = [
                'ar'         => $request->descrip_ar,
                'en'         => $request->descrip_en,
            ];
            $update = new JobResources($find->update());
            if($update)
                return response()->json([
                    'status' => 1, 
                    'success' =>__('main.Success'),
                ]);
            return response()->json(['error' => 'sorry can not insert']);
        }
    }

    public function active(Request $request){
        $job;
        $id = $request->job_active_id;
        $find = new JobResources(Job::find($id));
        if($find->is_active == 0){
            $job = new JobResources(Job::where('id', $id)->update(['is_active' => 1]));
        }else{
            $job = new JobResources(Job::where('id', $id)->update(['is_active' => 0]));
        }
        if($job)
            return response()->json([
                'status' => 1, 
                'success' =>__('main.Success'),
            ]);
        return response()->json(['error' => 'sorry can not insert']);
    }

    public function delete(Request $request){
        $id = $request->job_delete_id;
        $find = Job::find($id);
        $delete = new JobResources($find->delete());
        if($delete)
            return response()->json([
                'status' => 1, 
                'success' =>__('main.Success'),
            ]);
        return response()->json(['error' => 'sorry can not insert']);
    }
}
