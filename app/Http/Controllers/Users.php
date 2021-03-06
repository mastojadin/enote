<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;

class Users extends MyParentController
{
    public function index()
    {
        $search_role = request('search_role', false);
        $search_name = request('search_name', false);

        $all = User::getAllUsers(auth()->user()->role_id, $search_role, $search_name)->get();
        
        return view('users.index', compact('all'));
    }

    public function newUser()
    {
        $roles = Role::getAllRoles(auth()->user()->role_id)->get();

        return view('users.new', compact('roles'));
    }

    public function editUser($id)
    {
        $user = User::find($id);

        // check if logged role id is better ( better ranking ) than viewed user rule id
        if ($user->role_id <= auth()->user()->role_id && $user->id != auth()->user()->id) {
            return redirect()->route('users');
        }

        $roles = Role::getAllRoles(auth()->user()->role_id)->get();

        return view('users.edit', compact('user', 'roles'));
    }

    public function saveUser()
    {
        request()->validate([
            'role' => ['required'],
            'name' => ['required', 'alpha_num'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $name = request('name');
        $email = request('email');
        $role_id = request('role');
        $password = request('password');

        try {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->role_id = $role_id;
            $user->password = bcrypt($password);
            $user->save();
        } catch(\Exception $e) {
            $this->log->logme('debug', $e->getMessage(), __CLASS__, __LINE__, auth()->user()->id);
            session()->flash('myAlert', $this->alert->getAlert('10'));
            return redirect()->back();
        }

        // send email

        session()->flash('myAlert', $this->alert->getAlert('00'));
        return redirect()->back();
    }

    public function updateUser()
    {
        request()->validate([
            'role' => ['required'],
            'name' => ['required', 'alpha_num'],
            'email' => ['required', 'email'],
        ]);

        $id = request('edit_userID');
        $name = request('name');
        $email = request('email');
        $password = request('password', false);
        $role_id = request('role');

        try {
            $user = User::find($id);
            $user->name = $name;
            $user->email = $email;
            $user->role_id = $role_id;
            if ($password) $user->password = bcrypt($password);
            $user->save();
        } catch(\Exception $e) {
            $this->log->logme('debug', $e->getMessage(), __CLASS__, __LINE__, auth()->user()->id);
            session()->flash('myAlert', $this->alert->getAlert('10'));
            return redirect()->back();
        }

        // send email

        session()->flash('myAlert', $this->alert->getAlert('00'));
        return redirect()->back();
    }

    public function deleteUser()
    {
        $id = request('delete_userID');

        try {
            $user = User::find($id);
            $user->delete();
        } catch(\Exception $e) {
            $this->log->logme('debug', $e->getMessage(), __CLASS__, __LINE__, auth()->user()->id);
            session()->flash('myAlert', $this->alert->getAlert('10'));
            return redirect()->back();
        }

        // send email

        session()->flash('myAlert', $this->alert->getAlert('00'));
        return redirect()->back();
    }
}
