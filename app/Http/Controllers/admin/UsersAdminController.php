<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersAdminController extends Controller
{
    //
    public function ShowUsersAdmin()
    {
        return view('admin.users-manage');
    }
}
