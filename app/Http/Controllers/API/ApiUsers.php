<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\User as UserResources;
use App\Models\Permission;

class ApiUsers extends Controller
{
    //
    public function show()
    {
        $users = UserResources::collection(User::whereRoleIs('client')->get());
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

        if ($deletePermi->detachPermission($request->delete_permission))
            return redirect()->route('usersAdminManage')->with('success', __('main.Success'));
    }
}
