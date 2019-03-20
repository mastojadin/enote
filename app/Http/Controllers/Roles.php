<?php

namespace App\Http\Controllers;

use App\Models\Role;

use App\Rules\Lowercase;

class Roles extends MyParentController
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
            $this->log->logme('debug', $e->getMessage(), __CLASS__, __LINE__, auth()->user()->id);
            session()->flash('myAlert', $this->alert->getAlert('10'));
            return redirect()->back();
        }

        session()->flash('myAlert', $this->alert->getAlert('00'));
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
            $role->roles = $newRole;
            $role->save();
        } catch(\Exception $e) {
            $this->log->logme('debug', $e->getMessage(), __CLASS__, __LINE__, auth()->user()->id);
            session()->flash('myAlert', $this->alert->getAlert('10'));
            return redirect()->back();
        }

        session()->flash('myAlert', $this->alert->getAlert('00'));
        return redirect()->back();
    }

    public function deleteRole()
    {
        $id = request('delete_roleID');

        try {
            $role = Role::find($id);
            $role->delete();
        } catch(\Exception $e) {
            $this->log->logme('debug', $e->getMessage(), __CLASS__, __LINE__, auth()->user()->id);
            session()->flash('myAlert', $this->alert->getAlert('10'));
            return redirect()->back();
        }

        session()->flash('myAlert', $this->alert->getAlert('00'));
        return redirect()->back();
    }
}
