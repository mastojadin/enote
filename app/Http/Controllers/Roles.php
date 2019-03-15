<?php

namespace App\Http\Controllers;

use App\Models\Role;

class Roles extends Controller
{
    public function index()
    {
        $all = Role::all();

        return view('roles.index', compact('all'));
    }

    public function saveRole()
    {
        dd(request()->all());
    }

    public function updateRole()
    {
        dd(request()->all());
    }

    public function deleteRole()
    {
        dd(request()->all());
    }
}
