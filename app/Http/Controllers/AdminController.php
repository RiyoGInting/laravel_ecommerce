<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function profile()
    {
        $admin = Admin::find(1);
        return view('admin.profile', compact('admin'));
    }

    public function editProfile()
    {
        $admin = Admin::find(1);
        return view('admin.edit-profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = Admin::find(1);
        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin/' . $admin->profile_photo_path));
            $file_name = date('ymdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/admin'), $file_name);

            $admin->profile_photo_path = $file_name;
        }

        $admin->save();

        // toastr notifications
        $notification = array(
            'message' => 'Your profile has been updated',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function editPassword()
    {
        return view('admin.change-password');
    }

    public function updatePassword(Request $request)
    {
        $validate = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $admin_password = Admin::find(1)->password;

        if (Hash::check($request->current_password, $admin_password)) {
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();

            Auth::logout();

            return redirect()->route('admin.logout');
        }

        // toastr notifications
        $notification = array(
            'message' => 'Invalid Current Password',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
