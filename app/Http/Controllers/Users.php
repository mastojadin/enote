<?php

namespace App\Http\Controllers;

use App\Models\User;

class Users extends Controller
{
    public function index()
    {
        $all = User::with(['getRole', 'getAboutUser'])->get();

        return view('users.index', compact('all'));
    }

    public function newUser()
    {
        dd(request()->all());
    }

    public function editUser()
    {
        dd(request()->all());
    }

    public function saveUser()
    {
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
