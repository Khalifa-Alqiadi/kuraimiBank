<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\News as NewsResources;
class ApNewsAdmin extends Controller
{
    //

    public function show(){
        $news = NewsResources::collection(News::get());
        return view('admin.news-admin', [
            'news'          => $news,
        ]);
    }

    public function show_news(){
        $news = NewsResources::collection(News::get());
        return response()->json([
            'status'        => 1,
            'news'          => $news,
        ]);
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'title_ar'          => 'required',
            'title_en'          => 'required',
            'descrip_ar'        => 'required',
            'descrip_en'        => 'required',
            'image'             => 'required',
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        if($request->hasFile('image'))
            $image=$this->uploadFile($request->file('image'));
        $news = new NewsResources(News::create([
            'title'         => [
                'ar'            => $request->title_ar,
                'en'            => $request->title_en,
            ],
            'description'   => [
                'ar'            => $request->descrip_ar,
                'en'            => $request->descrip_en
            ],
            'background'    => $image,
        ]));
        if($news)
            return redirect('show-news')->with(['success' => 'News Inserted Success']);
        return back()->with(['error'=>'can not inserted']);
    }

    public function edit($id){
        $sp = new NewsResources(News::find($id));
        $news = News::find($id);
        return response()->json([
            'status'            => 1,
            'news'              => $news,
        ]);
    }

    public function update(Request $request){
        $validate = Validator::make($request->all(), [
            'title_edit_ar'          => 'required',
            'title_edit_en'          => 'required',
            'descrip_edit_ar'        => 'required',
            'descrip_edit_en'        => 'required',
            'image_edit'        => 'required',
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        if($request->hasFile('image_edit'))
            $image=$this->uploadFile($request->file('image_edit'));
        $id = $request->new_edit_id;
        $find = News::find($id);
        $find->title = [
            'ar'        => $request->title_edit_ar,
            'en'        => $request->title_edit_en,
        ];
        $find->description = [
            'ar'         => $request->descrip_edit_ar,
            'en'         => $request->descrip_edit_en,
        ];
        $find->background = $image;
        $update = new NewsResources($find->update());
        if($update)
            return redirect('show-news')->with(['success' => 'News Updated Success']);
        return back()->with(['error'=>'can not Updated']);
    }

    public function active(Request $request){
        $news;
        $id = $request->new_active_id;
        $find = new NewsResources(News::find($id));
        if($find->is_active == 0){
            $news = new NewsResources(News::where('id', $id)->update(['is_active' => 1]));
        }else{
            $news = new NewsResources(News::where('id', $id)->update(['is_active' => 0]));
        }
        if($news)
            return response()->json([
                'status' => 1, 
                'success' =>__('main.Success'),
            ]);
    }

    public function delete(Request $request){
        $id = $request->new_delete_id;
        $find = News::find($id);
        $delete = new NewsResources($find->delete());
        if($delete)
            return response()->json([
                'status' => 1, 
                'success' =>__('main.Success'),
            ]);
    }

    public function uploadFile($file)
    { 
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        return $filename;
    }
}
