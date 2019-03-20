<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\Lowercase;
use App\Rules\AlphaSpaces;
use App\Rules\AlphaNumSpaces;

class Profile extends Controller
{
    public function myprofile()
    {
        $user = User::where('id', '=', auth()->user()->id)->with('getAboutUser')->get()[0];

        return view('profile.myprofile', compact('user'));
    }

    public function update()
    {
        dd(request()->all());

        request()->validate([
            'middle_name' => ['alpha', new Lowercase],
            'last_name' => ['alpha', new Lowercase],
            'parent_name' => ['alpha', new Lowercase],
            'phone_one' => ['numeric'],
            'phone_two' => ['numeric'],
            'address' => [new AlphaNumSpaces],
            'city' => [new AlphaSpaces],
            'state' => [new AlphaSpaces],
            'pic' => ['image'],
        ]);
    }
}
