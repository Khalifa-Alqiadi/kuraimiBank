<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ApiAuthenticate extends Controller
{
    //

    public function show(){
        return view('admin.login');
    }

    public function sign_in(){
        $user = new User;
        $user->first_name = 'Khalifa';
        $user->Last_name = 'alqiadi';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('123123123');
        $user->gender = 1;
        $user->address = 'adl street';
        $user->phone = '738843852';
        if($user->save())
        $user->attachRole('admin');
    }

    public function login_save(Request $request)
    {
        Validator::validate($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'required' => __('main.required'),
            'email.email' => __('main.required'),
            'email.exists' => __('main.required'),
        ]);
        // dd($request);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->hasRole('admin'))
                return redirect()->route('homeAdmin');
                // return Auth::user()->hasRole('admin');
            else
                return redirect()->route('login');
        } 
    }


    public function checkRole()
    {
        if (Auth::user()->hasRole('admin'))
            return 'homeAdmin';
        else
            return 'login';
    }

    
}
