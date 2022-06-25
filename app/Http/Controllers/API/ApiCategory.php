<?php

namespace App\Http\Controllers\API;
use App\Http\Requests\FormValidation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Http\Resources\Category as CategoryResource;
use App\Http\Controllers\Enum\ValidateEnum;
class ApiCategory extends Controller
{
    //
    public function store(Request $request){
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED, $error->required());
        if(!$validate->passes()){
            return response()->json(['status' => 0, 'error'=> $validate->errors()->toArray()]);
        }else{
        $category = Category::create([
            'name' => [
                'ar'    => $request->name_ar,
                'en'    => $request->name_en
            ],
            'parent_category' => $request->parent_category
        ]);
         if($category) return response()->json(['status' => 1, 'success'=>__('main.Success')]);

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
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED, $error->required());
        if(!$validate->passes()){
            return response()->json(['status' => 0, 'error'=> $validate->errors()->toArray()]);
        }else{
            $id = $request->id;
            $category = Category::find($id);
            $category->name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ];
            $category->parent_category = $request->parent_category;
            if($category->update())
                return response()->json(['status' => 1, 'success'=>__('main.Success')]);
            return back()->with(['error'=>'can not inserted']);
        }
    }
    public function CategoryActive(Request $request){
        $category;
        $id = $request->category_id;
        $find = Category::find($id);
        if($find->is_active == 0){
            $category = new CategoryResource(Category::where('id', $id)->update(['is_active' => 1]));
        }else{
            $category = new CategoryResource(Category::where('id', $id)->update(['is_active' => 0]));
        }
        if($category)
            return response()->json(['status' => 1, 'success'=>__('main.Success')]);
            return back()->with(['error'=>'can not inserted']);
    }

    public function delete(Request $request){
        $id = $request->category_id;
        $find = Category::find($id);
        $delete = new CategoryResource($find->delete());
        if($delete)
            return response()->json(['status' => 1, 'success'=>__('main.Success')]);
        return back()->with(['error'=>'can not inserted']);
    }
}
