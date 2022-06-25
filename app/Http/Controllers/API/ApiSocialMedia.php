<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;
use App\Http\Controllers\Enum\ValidateEnum;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\SocialMedia as SocialMediaResources;
class ApiSocialMedia extends Controller
{
    //

    public function show(){
        $socialMedia = SocialMediaResources::collection(SocialMedia::latest()->get());
        return view('admin.social-madia-admin', [
            'socialMedia'           => $socialMedia
        ]);
    }

    public function showSocialMedia(){
        $socialMedia = SocialMediaResources::collection(SocialMedia::latest()->get());
        return response()->json([
            'status'        =>  1,
            'socialMedia'   => $socialMedia,
        ]);
    }

    public function store (Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_SOCIAL_MEDIA, $error->required());
        if(!$validate->passes()){
            return response()->json(['status' => 0, 'error'=> $validate->errors()->toArray()]);
        }else{
            $media = new SocialMediaResources(SocialMedia::create([
                'name'          => [
                    'ar'            => $request->name_ar,
                    'en'            => $request->name_en,
                ],
                'link'          => $request->link,
                'icons'         => $request->icons,
            ]));
            if($media)
                return response()->json([
                    'status'        => 1,
                    'success'       => __('main.Success'),
                ]);
            return back()->with(['error'=>'can not inserted']);
        }
    }

    public function edit($id){
        $sp = new SocialMediaResources(SocialMedia::find($id));
        $media = SocialMedia::find($id);
        return response()->json([
            'status'            => 1,
            'media'=> $media,
        ]);
    }

    public function update(Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_SOCIAL_MEDIA, $error->required());
        if(!$validate->passes()){
            return response()->json(['status' => 0, 'error'=> $validate->errors()->toArray()]);
        }else{
            $id = $request->edit_media_id;
            $find = SocialMedia::find($id);
            $find->name        = [
                'ar'            =>$request->name_ar,
                'en'           => $request->name_en,
            ];
            $find->link = $request->link;
            $find->icons = $request->icons;
            $update = new SocialMediaResources($find->update());
            if($update)
                return response()->json([
                    'status'        => 1,
                    'success'       => __('main.Success'),
                ]);
        }
    }

    public function active(Request $request){
        $active;
        $id = $request->media_active_id;
        $find = new SocialMediaResources(SocialMedia::find($id));
        if($find->is_active == 0){
            $active = new SocialMediaResources(SocialMedia::where('id', $id)->update(['is_active' => 1]));
        }else{
            $active = new SocialMediaResources(SocialMedia::where('id', $id)->update(['is_active' => 0]));
        }
        if($active)
            return response()->json([
                'status'        => 1,
                'success'       => __('main.Success'),
            ]);
        return back()->with(['error'=>'can not updated']);
    }

    public function delete(Request $request){
        $id = $request->media_delete_id;
        $find = SocialMedia::find($id);
        $delete = new SocialMediaResources($find->delete());
        if($delete)
            return response()->json([
                'status'        => 1,
                'success'       => __('main.Success'),
            ]);
        return back()->with(['error'=>'can not Deleted']);
    }
}
