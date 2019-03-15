<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Users extends Controller
{
    public function index()
    {
        $all = User::with(['getRole', 'getAboutUser'])->get();
        
        return view('users.index', compact('all'));
    }
}
