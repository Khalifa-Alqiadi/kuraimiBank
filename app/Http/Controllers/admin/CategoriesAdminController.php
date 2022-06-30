<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FormValidation;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Http\Resources\Category as CategoryResource;

class CategoriesAdminController extends Controller
{
    //

    public function ShowCategoryAdmin()
    {
        $categories = Category::latest()->get();
        return view('/admin.categories', ['categories' => $categories]);
    }

    public function homeAdmin()
    {
        $date = Category::get();
        $Jan = '';
        $Feb = '';
        $id = 0;

        foreach ($date as $da) {
            if ($da->created_at->format('m') == '06') {
                $Jan = 'Jan';
                $id++;
            } elseif ($da->created_at->format('m') == '08') {
                $Feb = 'Feb';
            }
        }
        $category = Category::count();
        return view('admin.indexAdmin', [
            'category' => $category,
            'Jab'      => $Jan,
            'Feb'       => $Feb,
            'id'        => $id
        ]);
    }

    public function editUser($id)
    {
        return view('admin.editUser');
    }

    public function store(Request $request)
    {


        $validation = Validator::make($request->all(), [
            'name.ar'       => 'required|min:6',
            'name.en'       => 'required',

        ], [
            'required' => 'kijfgirgjfriogfr',
            'min' => 'must be min 6',
        ]);
        if (!$validation->passes()) {
            return response()->json(['status' => 0, 'error' => $validation->errors()->toArray()]);
        } else {

            // $category = new Category;
            $data['name'] = $request->name;
            $data['parent_category'] = $request->parent;
            $category = Category::create($data);
            // return response()->json(['message' => 'add category success']);
            if ($category)
                return response()->json(['status' => 1, 'success' => 'add category success']);
            return back()->with(['error' => 'can not inserted']);
        }
    }

    public function show()
    {
        $categories = CategoryResource::collection(Category::latest()->get());
        return response()->json([
            'status'            => 1,
            'categories' => $categories,
            'locale' => app()->getLocale()
        ]);
    }

    function editCategory($id)
    {
        $category = Category::find($id);
        if ($category) {
            return response()->json([
                'status'    => 1,
                'category'     => $category
            ]);
        } else {
            return response()->json(['status' => 0, 'error' => 'Not Found']);
        }
    }

    public function update(Request $request)
    {
        $id = $request->cid;
        $data['name'] = $request->name;
        $category = Category::where('id', $id)->update($data);
        // return response()->json(['message' => 'add category success']);
        if ($category)
            return new CategoryResource($category);
    }

    public function errors()
    {
        return view('admin.errors-admin');
    }
}
