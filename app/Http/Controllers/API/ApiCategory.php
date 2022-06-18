<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Http\Resources\Category as CategoryResource;

class ApiCategory extends Controller
{
    //
    public function store(Request $request){
        

        $validation = Validator::make($request->all(),[
            'name.ar'       => 'required|min:6',
            'name.en'       => 'required',

        ],[
            'required' => 'kijfgirgjfriogfr',
            'min' => 'must be min 6',
        ]);
        if(!$validation->passes()){
            return response()->json(['status' => 0, 'error'=> $validation->errors()->toArray()]);
        }else{

        // $category = new Category;
        $data['name'] = $request->name;
        $data['parent_category'] = $request->parent;
        $category = new CategoryResource(Category::create($data));
         if($category)
            return response()->json(['status' => 1, 'success'=>'add category success']);
            return back()->with(['error'=>'can not inserted']);
        }
    }

    public function show(){
        $categories = CategoryResource::collection(Category::latest()->get());
        return response()->json([
            'status'            => 1,
            'categories'=> $categories,
            'locale' => app()->getLocale()
        ]);
    }

    function editCategory($id){
        $category = Category::find($id);
        if($category){
            return response()->json([
                'status'    => 1,
                'category'     => $category,
            ]);
        }else{
            return response()->json(['status' => 0, 'error'=> 'Not Found']);
        }
    }

    public function UpdateCategory(Request $request){
        $id = $request->cid;
        $data['name'] = $request->name;
        $category = new CategoryResource(Category::where('id', $id)->update($data));
        if($category)
            return response()->json(['status' => 1, 'success'=>'add category success']);
            return back()->with(['error'=>'can not inserted']);
    }
    public function CategoryActive(Request $request){
        $category;
        $id = $request->categoryid;
        $find = Category::find($id);
        if($find->is_active == 0){
            $category = new CategoryResource(Category::where('id', $id)->update(['is_active' => 1]));
        }else{
            $category = new CategoryResource(Category::where('id', $id)->update(['is_active' => 0]));
        }
        if($category)
            return response()->json(['status' => 1, 'success'=>'add category success']);
            return back()->with(['error'=>'can not inserted']);
    }
}
