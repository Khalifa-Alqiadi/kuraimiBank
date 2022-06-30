<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\ValidateEnum;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\User as UserResources;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;

class ApiUsers extends Controller
{
    //
    public function show()
    {
        $users = UserResources::collection(User::get());
        // $users = ;
        // \Laratrust::hasRole('admin');
        // foreach ($users as $user) {
        //     foreach ($user->AllPermissions() as $permi) {
        //         echo $permi->name;
        //     }
        // }
        // $role = User::whereDoesntHaveRole()->get();
        // dd($users);
        $perimission = Permission::get();
        // dd($perimission->allPermissions());
        return view('admin.users-manage', [
            'users'         => $users,
            'perimission'   => $perimission
        ]);
    }

    public function updatePermission(Request $request)
    {
        // dd($request);
        $id = $request->userid;
        $user = User::find($id);
        $user->first_name = $request->name;
        $user->update();
        $user->syncPermissions($request->permission);
        // dd($user);
        if ($user)
            return redirect()->route('usersAdminManage')->with('success', __('main.Success'));
        // return back()->with(['error' => 'can not inserted']);
    }

    public function delete(Request $request)
    {
        $id = $request->delete_userid;
        $deletePermi = User::find($id);
        $perimission = Permission::find($request->delete_permission);
        if ($deletePermi->detachPermission($perimission->name))
            return redirect()->route('usersAdminManage')->with('success', __('main.Success'));
    }

    public function update(Request $request)
    {
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_USERS, $error->required());
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        if ($image = $request->hasFile('image_new'))
            $image = $this->uploadFile($request->file('image_new'));
        else
            $image = $request->image;

        $id = $request->userid;
        // dd($request)
        $user = User::find($id);
        $user->first_name = $request->firstnsme;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->image = $image;
        $update = $user->update();
        if ($update)
            return redirect()->route('usersAdminManage')->with('success', __('main.Success'));
    }


    public function uploadFile($file)
    {
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        return $filename;
    }
}
