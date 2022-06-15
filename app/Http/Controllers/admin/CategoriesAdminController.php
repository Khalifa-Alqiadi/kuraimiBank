<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoriesAdminController extends Controller
{
    //

    public function ShowCategoryAdmin(){
        $categories = Category::latest()->get();
        return view('/admin.categories', ['categories' => $categories]);
    }

    public function homeAdmin(){
        
        return view('admin.indexAdmin');
    }

    public function editUser($id){
        return view('admin.editUser');
    }
}
