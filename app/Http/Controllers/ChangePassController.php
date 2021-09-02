<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class ChangePassController extends Controller
{
    // Password
    public function CPassword(){
        return view('admin.body.change_password');
    }

    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
            if(Hash::check($request->oldpassword, $hashedPassword)){
                $user = User::find(Auth::id());
                $user->password = HasH::make($request->password); // Adicionando hash á nova senha
                $user->save();
                Auth::logout();

                return Redirect()->route('login')->with('success', 'Password Is Change Successfully');
            } else {

                return Redirect()->back()->with('error', 'Current Password Is Invalid');
            }
    }

    // User Profile
    public function PUpdate() {
        if(Auth::user()) {
            $user = User::find(Auth::user()->id);
                if($user) {
                    return view('admin.body.update_profile', compact('user'));
                }
        }
    }

    public function UpdateProfile(Request $request) {
        $user = User::find(Auth::user()->id);
            if($user) {
                $user->name = $request->name;
                $user->email = $request->email;

                $user->save();

                return Redirect()->back()->with('success', 'User Profile Is Update Successfully');
            } else {
                return Redirec()->back();
            }
    }

}
