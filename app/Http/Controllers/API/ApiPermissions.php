<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class ApiPermissions extends Controller
{
    //\
    public function show()
    {
        $permissions = Permission::get();
        $roles = Role::get();

        return view('admin.permissions-manage', [
            'permissions'           => $permissions,
            'roles'                 => $roles,
        ]);
    }

    public function active(Request $request)
    {
        $id = $request->permission_id;
        $find = Permission::find($id);
        if ($find->is_active == 0) {
            $active = $find->update(['is_active' => 1]);
            return redirect()->route('show-permission')->with('success', __('main.Success'));
        } else {
            $active = $find->update(['is_active' => 0]);
            return redirect()->route('show-permission')->with('success', __('main.Success'));
        }
    }


    public function store(Request $request)
    {
        $roles = new Role;
        $roles->name = $request->rolename;
        if ($roles->save()) {
            $roles->attachPermissions($request->permission);
            return redirect()->route('show-permission')->with('success', __('main.Success'));
        }
    }
}
