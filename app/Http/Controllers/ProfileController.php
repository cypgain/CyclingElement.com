<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateInformation(Request $request)
    {
        $user = Auth::user();

        $attributes = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'avatar' => ['file'],
        ]);

        if (isset($request->avatar))
        {
            $attributes['avatar'] = $request->avatar->store('avatars');
        }

        $user->update($attributes);

        return back()->with('message_profile', 'Your profile information has been updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (Hash::check($request->current_password, $user->password))
        {
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('message_password', 'Your password has been updated successfully.');
        }
        else
        {
            return back()->withErrors(['current_password' => 'Sorry, your current password was not recognised. Please try again.']);
        }
    }

    public function index()
    {
        return view('profile');
    }

}
