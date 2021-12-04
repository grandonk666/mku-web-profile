<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index', [
            'title' => 'User',
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view("admin.user.create", [
            "title" => "Tambah User"
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|max:255',
            'is_admin' => 'boolean'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('admin.user.index')->with("success", "Data User Berhasil Ditambah");
    }

    public function edit(User $user)
    {
        return view("admin.user.edit", [
            "title" => "Edit User",
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'is_admin' => 'boolean'
        ];

        if ($request->email && $request->email != $user->email) {
            $rules['email'] = 'required|unique:users,email';
        }
        if ($request->password) {
            $rules['password'] = 'required|min:8|max:255';
        }

        $validatedData = $request->validate($rules);
        if ($validatedData['password']) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            $validatedData['password'] = $user->password;
        }

        User::where('id', $user->id)->update($validatedData);

        return redirect()->route('admin.user.index')->with("success", "Data User Berhasil Diupdate");
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect()->route('admin.user.index')->with("success", "Data User Berhasil Dihapus");
    }

    // public function update_role(User $user, Request $request)
    // {
    //     $request->validate(['is_admin' => 'boolean']);
    //     $user->is_admin = $request->is_admin;
    //     $user->save();

    //     return redirect()->back()->with("success", "Role User Berhasil Diupdate");
    // }
}
