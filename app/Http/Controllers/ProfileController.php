<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show() {
        return view("profile");
    }

    public function update(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);
        Auth::user()->update($request->all());
        alert()->success('Your info has been updated');
        return redirect()->back();
    }

    public function password(Request $request) {
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        if (Hash::check($request->password, Auth::user()->password)) {
            Auth::user()->update([
                'password' => bcrypt($request->new_password)
            ]);
            alert()->success('Password updated');
        } else {
            alert()->error('Password mismatch');
        }
        return redirect()->back();
    }
}
