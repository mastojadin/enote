<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Rules\Lowercase;
use App\Rules\AlphaSpaces;
use App\Rules\AlphaNumSpaces;

use App\Helpers\Alerts;
use App\Helpers\Logs as L;

class Profile extends Controller
{
    public function myprofile()
    {
        $user = User::where('id', '=', auth()->user()->id)->with('getAboutUser')->get()[0];

        return view('profile.myprofile', compact('user'));
    }

    public function update()
    {
        request()->validate([
            'first_name' => [new AlphaSpaces],
            'middle_name' => [new AlphaSpaces],
            'last_name' => [new AlphaSpaces],
            'parent_name' => [new AlphaSpaces],
            'phone_one' => ['numeric'],
            'phone_two' => ['numeric'],
            'address' => [new AlphaNumSpaces],
            'city' => [new AlphaSpaces],
            'state' => [new AlphaSpaces],
            'pic' => ['image'],
        ]);

        $first_name = request('first_name');
        $middle_name = request('middle_name');
        $last_name = request('last_name');
        $parent_name = request('parent_name');
        $phone_one = request('phone_one');
        $phone_two = request('phone_two');
        $address = request('address');
        $city = request('city');
        $state = request('state');
        $pic = request()->file('pic');

        $id = request('aboutuser_id', false);

        try {
            $about_user = !$id ? new AboutUser() : AboutUser::find($id);
            if (!$id) $about_user->user_id = auth()->user()->id;

            $about_user->first_name = $first_name;
            $about_user->middle_name = $middle_name;
            $about_user->last_name = $last_name;
            $about_user->parent_name = $parent_name;
            $about_user->phone_one = $phone_one;
            $about_user->phone_two = $phone_two;
            $about_user->address = $address;
            $about_user->city = $city;
            $about_user->state = $state;
            $about_user->save;
        } catch(\Exception $e) {
            L::logme('debug', $e->getMessage(), __CLASS__, __LINE__, auth()->user()->id);
            session()->flash('myAlert', Alerts::getAlert('10'));
            return redirect()->back();
        }

        if ($pic != null) {
            $pic_type = str_replace('image/', '', $pic->getMimeType());
            $pic_name = auth()->user()->id;
            $pic_tmpname = getClientOriginalName();

            try {
                move_uploaded_file($pic_tmpname, public_path('profile_images/' . $pic_name . '.' . $pic_type));
            } catch(\Exception $e) {
                L::logme('debug', $e->getMessage(), __CLASS__, __LINE__, auth()->user()->id);
                session()->flash('myAlert', Alerts::getAlert('11'));
                return redirect()->back();
            }
        }

        session()->flash('myAlert', Alerts::getAlert('00'));
        return redirect()->back();
    }
}
