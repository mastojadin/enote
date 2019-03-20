<?php

namespace App\Http\Controllers;

use App\Models\Role;

use App\Rules\Lowercase;

use App\Helpers\Alerts;
use App\Helpers\Logs as L;

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

        try {
            $role = new Role;
            $role->role = $newRole;
            $role->save();
        } catch(\Exception $e) {
            L::logme('debug', $e->getMessage(), __CLASS__, __LINE__, auth()->user()->id);
            session()->flash('myAlert', Alerts::getAlert('10'));
            return redirect()->back();
        }

        session()->flash('myAlert', Alerts::getAlert('00'));
        return redirect()->back();
    }

    public function updateRole()
    {
        request()->validate([
            'edit_role' => ['required', 'alpha', new Lowercase],
        ]);

        $newRole = request('edit_role');
        $id = request('edit_roleID');

        try {
            $role = Role::find($id);
            $role->role = $newRole;
            $role->save();
        } catch(\Exception $e) {
            L::logme('debug', $e->getMessage(), __CLASS__, __LINE__, auth()->user()->id);
            session()->flash('myAlert', Alerts::getAlert('10'));
            return redirect()->back();
        }

        session()->flash('myAlert', Alerts::getAlert('00'));
        return redirect()->back();
    }

    public function deleteRole()
    {
        $id = request('delete_roleID');

        try {
            $role = Role::find($id);
            $role->delete();
        } catch(\Exception $e) {
            L::logme('debug', $e->getMessage(), __CLASS__, __LINE__, auth()->user()->id);
            session()->flash('myAlert', Alerts::getAlert('10'));
            return redirect()->back();
        }

        session()->flash('myAlert', Alerts::getAlert('00'));
        return redirect()->back();
    }
}
