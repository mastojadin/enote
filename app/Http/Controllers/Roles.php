<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Rules\Lowercase;

class Roles extends Controller
{
    public function index()
    {
        $all = Role::all();

        return view('roles.index', compact('all'));
    }

    public function saveRole()
    {
        request()->validate([
            'role' => ['required', 'alpha', new Lowercase],
        ]);

        $newRole = request('role');
        $role = new Role;
        $role->role = $newRole;
        $role->save();

        session()->flash('myAlert', ['type' => 'success', 'msg' => 'Action successful.']);

        return redirect()->back();
    }

    public function updateRole()
    {
        request()->validate([
            'edit_role' => ['required', 'alpha', new Lowercase],
        ]);

        $newRole = request('edit_role');
        $id = request('edit_roleID');
        $role = Role::find($id);
        $role->role = $newRole;
        $role->save();

        session()->flash('myAlert', ['type' => 'success', 'msg' => 'Action successful.']);

        return redirect()->back();
    }

    public function deleteRole()
    {
        $id = request('delete_roleID');
        $role = Role::find($id);
        $role->delete();

        session()->flash('myAlert', ['type' => 'success', 'msg' => 'Action successful.']);

        return redirect()->back();
    }
}
