<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
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
        if($id != null) {
            $data = UserRole::find($id);
            return view('admin.role.form')->with([
                'data' => $data
            ]);
        }

        return view('admin.role.form');
    }

    public function save(Request $request, $id = null) {
        $data = new UserRole;

        if($id != null) {
            $data = UserRole::find($id);
        }

        $data->role_name = $request->role_name;
        $data->save();

        return redirect()->route('role');
    }

    public function delete($id) {
        $data = UserRole::find($id);
        $data->delete();
        return redirect()->back();
    }
}
