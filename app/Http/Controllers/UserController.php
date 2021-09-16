<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function editProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.users.edit-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user/' . $user->profile_photo_path));
            $file_name = date('ymdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/user'), $file_name);

            $user->profile_photo_path = $file_name;
        }

        $user->save();

        // toastr notifications
        $notification = array(
            'message' => 'Your profile has been updated',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }

    public function changePassword()
    {
        return view('frontend.users.change-password');
    }

    public function updatePassword(Request $request)
    {
        $validate = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $user_password = Auth::user()->password;
        if (Hash::check($request->current_password, $user_password)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

            Auth::logout();

            return redirect()->route('user.logout');
        }

        // toastr notifications
        $notification = array(
            'message' => 'Invalid Current Password',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function logout()
    {
        Auth::logout();

        // toastr notifications
        $notification = array(
            'message' => 'You have been logged out',
            'alert-type' => 'success'
        );

        return redirect()->route('login')->with($notification);
    }
}
