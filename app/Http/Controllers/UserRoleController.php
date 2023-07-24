<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\RolePermission;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index() {
        $data = UserRole::get();
        return view('admin.role.index')->with([
            'data' => $data
        ]);
    }

    public function getDeletedUserRoles() {
        $data = UserRole::onlyTrashed()->get();
        return view('admin.role.deleted')->with([
            'data' => $data
        ]);
    }

    public function form($id = null) {
        $permissions = Permission::get();
        if($id != null) {
            $data = UserRole::find($id);
            return view('admin.role.form')->with([
                'data' => $data,
                'permissions' => $permissions
            ]);
        }

        return view('admin.role.form')->with([
            'permissions' => $permissions
        ]);
    }

    public function save(Request $request, $id = null) {
        $data = new UserRole;

        if($id != null) {
            $oldRolePermission = RolePermission::where('role_id', $id)->delete();

            $data = UserRole::find($id);
        }

        $data->role_name = $request->role_name;
        $data->save();

        for ($i=0; $i < count($request->checkeds); $i++) { 
            $rolePermission = new RolePermission;
            $rolePermission->role_id = $data->id;
            $rolePermission->permission_id = $request->checkeds[$i];
            $rolePermission->save();
        }

        return redirect()->route('role');
    }

    public function delete($id) {
        $data = UserRole::find($id);
        $data->delete();
        return redirect()->back();
    }
}
