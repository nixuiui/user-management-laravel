<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index() {
        $data = User::get();
        return view('admin.user.index')->with([
            'data' => $data
        ]);
    }

    public function getDeletedUsers() {
        $data = User::onlyTrashed()->get();
        return view('admin.user.deleted')->with([
            'data' => $data
        ]);
    }

    public function form($id = null) {
        $roles = UserRole::get();

        if($id != null) {
            $data = User::find($id);
            return view('admin.user.form')->with([
                'roles' => $roles,
                'data' => $data
            ]);
        }

        return view('admin.user.form')->with([
            'roles' => $roles
        ]);
    }

    public function save(Request $request, $id = null) {
        if($id == null) {
            $this->validate($request, [
                'role_id'   => 'required|exists:user_roles,id',
                'name'      => 'required|string|max:255',
                'email'     => 'required|string|email|max:255|unique:users',
                'password'  => 'required|string|min:6'
            ]);
        } else {
            $this->validate($request, [
                'role_id'   => 'required|exists:user_roles,id',
                'name'      => 'required|string|max:255',
                'email'     => 'required|string|email|max:255|unique:users,email,'.$id,
                'password'  => 'nullable|string|min:6'
            ]);
        }

        $data = new User;

        if($id != null) {
            $data = User::find($id);
        }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->role_id = $request->role_id;

        if($request->password) {
            $data->password = $request->password;
        }

        $data->save();

        return redirect()->route('user');
    }

    public function delete($id) {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }
}
