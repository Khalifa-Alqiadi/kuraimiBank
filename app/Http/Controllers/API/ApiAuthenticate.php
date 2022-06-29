<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\ValidateEnum;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiAuthenticate extends Controller
{
    //

    public function show()
    {
        // return view('admin.login');
        if (Auth::check())
            return redirect()->route($this->checkRole());
        else
            return view('admin.login');
    }

    public function login_save(Request $request)
    {
        $errore = new ValidateEnum;
        Validator::validate($request->all(), ValidateEnum::REQUIRED_LOGIN_ADMIN, $errore->required());
        // dd($request);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->hasRole(['admin', 'admin_services', 'admin_reports'])) {
                return redirect('homeAdmin');
            } else {
                return redirect('/');
            }
        }
    }


    public function checkRole()
    {
        if (!Auth::user()->hasRole('admin'))

            return 'login';
        else
            return 'homeAdmin';
    }

    public function logout()
    {

        Auth::logout();
        return redirect()->route('login');
    }
}
