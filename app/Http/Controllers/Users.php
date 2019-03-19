<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;

class Users extends Controller
{
    public function index()
    {
        $all = User::getAllUsers(auth()->user()->role_id)->get();

        return view('users.index', compact('all'));
    }

    public function newUser()
    {
        $roles = Role::getAllRoles(auth()->user()->role_id)->get();

        return view('users.new', compact('roles'));
    }

    public function editUser($id)
    {
        dd(request()->all());
    }

    public function saveUser()
    {
        request()->validate([
            'role' => ['required'],
            'name' => ['required', 'alpha_num'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        dd(request()->all());
    }

    public function updateUser()
    {
        dd(request()->all());
    }

    public function deleteUser()
    {
        dd(request()->all());
    }
}
